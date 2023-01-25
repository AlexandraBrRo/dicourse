
<form action="index.php" style="display: flex; flex-direction: column; width: 313px; height: 300px; margin: 0 auto" >
    <label for="pass">
        input your password
        <input type="text"  name="pass" placeholder="password">
    </label>
    <button type="submit"> validate </button>
    <p>Your password must be included this pattern "!@#$%^&*(),.?":{}|<>" and number letter</p>

<?php

use DiStudy\Configs\DbConfigsHardCode;
//use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Pdo\Connection;
use DiStudy\DbServices\Pdo\Repository;
//use DiStudy\DbServices\Mysql\Connection;
//use DiStudy\DbServices\Mysql\Repository;

use DiStudy\Validators\UpperCaseValidator;
use DiStudy\Validators\NumberValidation;
use DiStudy\Validators\SpecialSimbolValidator;
use DiStudy\Validators\CompositeValidator;

$validators = [
        new UpperCaseValidator(),
        new NumberValidation(),
        new SpecialSimbolValidator(),
];

//$validators = new CompositeValidator();

require __DIR__ . '/vendor/autoload.php';

$dbConfigs = new DbConfigsHardCode();
//$dbConfigs = new DbConfigsJson('dbConfig.json');
$connection = new Connection($dbConfigs);
$repository= new Repository($connection);



if (isset($_POST['pass'])) : ?>

<h1><?= $validators->validate($_POST['pass']) ? "Валідний" : "Не валідний" ?></h1>

<?php endif; ?>

</form>



//class QueryBuilder{
//    private $db;
//    public function __construct(\DiStudy\Interfaces\ConnectionInterface $connection){
//
//        $this->db = $connection;
//
//    }
//
//    public function select($tableName){
//        $statement = $this->db->query("SELECT * FROM $tableName");
//        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }
//    public function get(){
//
//    }
//}

//$connection = new Connection();


//$dbConnect = new PDO("mysql:host=localhost;dbname=dicourse", 'root', '');
//$statement = $dbConnect->query("SELECT * FROM users");
//$users = $statement->fetchAll(PDO::FETCH_ASSOC);

//$statement = $dbConnect->query("SELECT * FROM posts");
//$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

