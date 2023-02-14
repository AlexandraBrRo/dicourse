<form action="eta.php" method="get">
    <input type="text" name="postcode" placeholder="postcode">
    <input type="text" name="best" placeholder="best">
    <input type="text" name="worst" placeholder="worst">

    <button type="submit">set new eta</button>
</form>

<a href="index.php">first page</a>

<?php
use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Pdo\Connection;
use DiStudy\DbServices\PostcodeServices\PostcodeRepository;
use DiStudy\inputValidators\NotEmpty;
use DiStudy\inputValidators\NumberInputValidator;
use DiStudy\inputValidators\NumberCountValidator;
use DiStudy\inputValidators\InputsValidator;

require __DIR__ . '/vendor/autoload.php';

$configsDB = new DbConfigsJson('etaDbConfigs.json');
$connection = new Connection($configsDB);
$repositoryPostcode = new PostcodeRepository($connection, 'shipping_food');
$validatorsPostcode = [
    new NotEmpty(),
    new NumberInputValidator(),
    new NumberCountValidator(4)
];

$postcodeValidators = new InputsValidator($validatorsPostcode);
$validatorsEta = [
    new NotEmpty(),
    new NumberInputValidator(),
    new NumberCountValidator(2, 'false')
];
$etaValidators = new InputsValidator($validatorsEta);


if($_GET){
    if($postcodeValidators->validate($_GET['postcode'])
        && $etaValidators->validate($_GET['best'])
        && $etaValidators->validate($_GET['worst'])
    ){
        if($_GET['best'] > $_GET['worst']){
            echo 'best can`t be bigger than worst';
        }else{
            echo $setPostcode = $repositoryPostcode->setNewPostcode($_GET['postcode'], $_GET['best'], $_GET['worst']);
        }
    }else{
    echo 'wrong postcode';
    }
}