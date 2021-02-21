<?php

// ----------------
// Select Test.
// ----------------

// 検索キーワード(配列渡し)
/// AND条件の時には、配列で条件を書いていく
/// OR条件の際には、連想配列で列記していく
$where[] = array('service-a' => 'foo', 'service-b' => 'anonymous');
$where[] = array('service-a' => 'bar');

// 結果の配列に欲しいカラム名（配列渡し）
$ret_obj = array('name', 'service-a', 'service-b', 'service-c');

// 検索の実行
$ret = $dbh->select($db, $col, $where, $ret_obj);

// $ret - 連想配列
// - 定義されていないカラムは、NULLで帰ってくる
var_dump($ret);
