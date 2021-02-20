<?php

$db = $_ENV['name_db'];
$col = $_ENV['name_collection'];

$array[] = array('name' => 'まゆしぃ', 'twitter' => 'mayu___cs');
$array[] = array('name' => 'kei', 'twitter' => 'kei9298d');
$array[] = array('name' => 'てんぷらジュース', 'twitter' => 'TempraJuice');
$array[] = array('name' => '葵', 'twitter' => 'Aoichaan0513');

$ret = $dbh->insert($db, $col, $array);

var_dump($ret);