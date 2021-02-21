<?php

// ----------------
// Update Test.
// ----------------

$updates[] = array(
    'where' => array('service-a' => 'kei9298d'),
    'update' => array('service-b' => 'anonymous', 'service-c' => 'kei9298d')
);

// Run
$ret = $dbh->update($db, $col, $updates);

var_dump($ret);
