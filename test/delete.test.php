<?php
$db = $_ENV['name_db'];
$col = $_ENV['name_collection'];

// 削除条件(配列渡し)
/// AND条件の時には、配列で条件を書いていく
/// OR条件の際には、連想配列で列記していく
$where[] = array('pornhub' => 'anonymous');

$ret = $dbh->delete($db, $col, $where);

// $ret - 連想配列
// - 定義されていないカラムは、NULLで帰ってくる
var_dump($ret);
