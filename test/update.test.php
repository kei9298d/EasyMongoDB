<?php

$db = $_ENV['name_db'];
$col = $_ENV['name_collection'];

$updates[] = array(
    'where' => array('twitter' => 'kei9298d'),
    'update' => array('pornhub' => 'anonymous', 'github' => 'kei9298d')
);

// Run
$ret = $dbh->update($db, $col, $updates);

var_dump($ret);
