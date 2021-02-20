## Install
```
composer require vlucas/phpdotenv
composer require mongodb/mongodb
```

# How-to-use

## init
in `index.html`

```
require('./vendor/autoload.php');
require('./lib/mongodb.class.php');

// Load $_ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create DB Handler
$dbh = new DB();
```

## Insert

Function : `$dbh->insert();`
```
insert_array[] = array('foo'=>;bar', 'hoge'=>'fumu');
insert_array[] = ...

$db_name = 'db';
$collection_name = 'collection';

$dbh->insert($db_name, $collection_name, $insert_array);
```

