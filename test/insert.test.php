<?php


// ----------------
// Insert Test.
// ----------------

$array[] = array('name' => 'mayu', 'service-a' => 'mayu');
$array[] = array('name' => 'kei', 'service-a' => 'kei9298d');
$array[] = array('name' => 'juice', 'service-a' => 'Juice');
$array[] = array('name' => 'aoi', 'service-a' => 'Aoi');

$ret = $dbh->insert($db, $col, $array);

var_dump($ret);