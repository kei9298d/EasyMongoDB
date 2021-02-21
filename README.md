# EasyMongoDB

MongoDBを簡単に使えるようにした、RapperClass.

## How-to-use

### Install
```
git clone https://github.com/kei9298d/EazyMongoDB.git
composer install
```

### Init
see `index.html`
```
require('./vendor/autoload.php');
require('./lib/mongodb.class.php');

// Load $_ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create DB Handler
$dbh = new DB();

// Select DB & Collection.
$db_name = 'db';
$collection_name = 'collection';
```

Edit `.env`
```
# MongoDB Credencial
db_host = 'localhost'
db_user = ''
db_pass = ''

# DB & Collections
name_db = 'wankoromethod'
name_collection = 'members'

```

### Insert
Function : `$dbh->insert(<DB>, <COLLECTION>, <Array>);`  
see `test/insert.test.php`
```
$insert_array[] = array('foo'=>;bar', 'hoge'=>'fumu');
//...

$dbh->insert($db_name, $collection_name, $insert_array);
```

### Select
Function : `$dbh->select(<DB>, <COLLECTION>, <WHERE Array>, <COLUMNS Array>);`  
see `test/select.test.php`
```
// AND
$where[] = array('twitter' => 'foo', 'pornhub' => 'anonymous');
// OR
$where[] = array('twitter' => 'bar');

$ret_obj = array('name', 'twitter', 'github', 'pornhub');

$ret = $dbh->select($db, $col, $where, $ret_obj);
```

### Update
Function : `$dbh->select(<DB>, <COLLECTION>, <UPDATE_Array>);`  
see `test/update.test.php`
```
$updates[] = array(
    'where' => array('twitter' => 'kei9298d'),
    'update' => array('pornhub' => 'anonymous', 'github' => 'kei9298d')
);

$ret = $dbh->update($db, $col, $updates);

```

### Delete
Function : `$dbh->delete(<DB>, <COLLECTION>, <WHERE>)`  
see `test.delete.test.php`
```
$where[] = array('pornhub' => 'anonymous');
// ...
$ret = $dbh->delete($db, $col, $where);
```
