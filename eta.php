

<?php

use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Mysql\Connection;

//$configsDB = new DbConfigsJson('etaDbConfigs.json');
//$connection = new Connection($configsDB);
//$connection->make();



$validators = [
    new SpecialSimbolValidator(),
    new UpperCaseValidator(),
    new NumberValidator(),
];

$composit = new CompositeValidator($validators);


//$dbConfigs = new DbConfigsHardCode();
$dbConfigs = new DbConfigsJson('dbConfig.json');
$connection = new Connection($dbConfigs);
$repository= new Repository($connection);




if (isset($_POST['pass'])) : ?>

    <h1><?= $composit->validate($_POST['pass']) ? "Валідний" : "Не валідний" ?></h1>

<?php endif; ?>

</form>