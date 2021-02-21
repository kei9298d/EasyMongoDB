<?php

class DB{

    // ----------------
    // Private vars
    // ----------------
    private $dbh;

    // ----------------
    // コンストラクタ
    // ----------------
    function __construct() {

        // Generate URI
        $uri = 'mongodb://';
        if($_ENV['db_user'] != '') {
            $uri .= $_ENV['db_user'];
            if($_ENV['db_pass'] != '') {
                $uri .=':'.$_ENV['db_pass'];
            }
            $uri .= '@';
        }
        $uri .= $_ENV['db_host'];

        // Connection
        $this->dbh = new MongoDB\Driver\Manager( $uri );
    }

    // ----------------
    //  Insert
    // ----------------
    public function insert ($db, $collection, $array) {
       // $db- - DB名
       // $collection - 対象のコレクション
       // $array - 連想配列 (挿入値)

        // 簡単なエラーチェック
       if($db == '' || $collection == '') { return -1; }
       if(is_array($array) === false ) { return -1; }

        // Insertするコレクション名
        $dbn = sprintf('%s.%s', $db, $collection);

        // Insertに使うオブジェクト
        $bulk = new MongoDB\Driver\BulkWrite;

        foreach($array as $row) {
            // 連想配列を1行づつ、Bulkにinsertしていく
            $bulk->insert($row);
        }
        
        // Write
        $ret = $this->dbh->executeBulkWrite($dbn, $bulk);
        return($ret);
    }

    // ----------------
    // Select
    // ----------------
    public function select($db, $collection, $wheres, $ret_obj_ary) {
        // $db- - DB名
        // $collection - 対象のコレクション
        // $where - 連想配列 (検索条件/1行のみ)

        // 簡単なエラーチェック
        if($db == '' || $collection == '') { return -1; }
        if(is_array($wheres) === false ) { return -1; }
        if(is_array($ret_obj_ary) === false ) { return -1; }

        // 検索オプション(使用していない)
        $options = array();

        // Selectするコレクション名
        $dbn = sprintf('%s.%s', $db, $collection);

        foreach($wheres as $where) {
            $query = new MongoDB\Driver\Query($where); // 第2引数は$options.
            // Return - Array
            $res_ary = $this->dbh->executeQuery($dbn, $query)->toArray();
    
            // 検索結果を連想配列に纏め直す
            foreach ( $res_ary as $res ) {
                foreach ($ret_obj_ary as $ret_obj ){
                    if (isset($res->$ret_obj) === true) $ret[$ret_obj] = $res->$ret_obj;
                    else $ret[$ret_obj] = null;
                }
                $ret_ary[] = $ret;
            }
        }

        return($ret_ary);
    }

    // ----------------
    //  Update
    // ----------------
    public function update ($db, $collection, $updates) {
       // $db- - DB名
       // $collection - 対象のコレクション
       // $array - 連想配列 (挿入値)

        // 簡単なエラーチェック
       if($db == '' || $collection == '') { return -1; }
       if(is_array($updates) === false ) { return -1; }

        // UpdateするCollection
        $dbn = sprintf('%s.%s', $db, $collection);

        $bulk = new MongoDB\Driver\BulkWrite;

        foreach($updates as $update) {
            $bulk->update(
                $update['where'],
                array( '$set' => $update['update'])
            );
        }
        
        // Write
        $ret = $this->dbh->executeBulkWrite($dbn, $bulk);
        return($ret);
    }

    // ----------------
    //  Delete
    // ----------------
    public function delete ($db, $collection, $wheres) {
        // $db- - DB名
        // $collection - 対象のコレクション
        // $array - 連想配列 (挿入値)
 
         // 簡単なエラーチェック
        if($db == '' || $collection == '') { return -1; }
        if(is_array($wheres) === false ) { return -1; }
 
         // UpdateするCollection
         $dbn = sprintf('%s.%s', $db, $collection);
 
         $bulk = new MongoDB\Driver\BulkWrite;
 
         foreach($wheres as $where) {
             $bulk->delete($where);
         }
         
         // Write
         $ret = $this->dbh->executeBulkWrite($dbn, $bulk);
         return($ret);
    }
 
}