<?php

require('./vendor/autoload.php');
require('./lib/mongodb.class.php');

// Load $_ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create DB Handler
$dbh = new DB();

$db     = $_ENV['name_db'];
$col    = $_ENV['name_collection'];

// ----------------
// Test codes.
// ----------------

//require_once('./test/insert.test.php');
//require_once('./test/update.test.php');
//require_once('./test/delete.test.php');
//require_once('./test/select.test.php');
