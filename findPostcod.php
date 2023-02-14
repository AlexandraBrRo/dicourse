<?php
use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Pdo\Connection;
use DiStudy\DbServices\PostcodeServices\PostcodeRepository;

require __DIR__ . '/vendor/autoload.php';

$configsDB = new DbConfigsJson('etaDbConfigs.json');
$connection = new Connection($configsDB);
$repositoryPostcode = new PostcodeRepository($connection, 'shipping_food');
if(isset($_POST['postcode'])){
   $result = $repositoryPostcode->hasPostcode($_POST['postcode']);
}

?>
<a href="index.php">next page</a>

<form action="findPostcod.php" method="get">
    <input type="text" name="postcode">
    <button type="submit">find postcode</button>
</form>

<h1><?= $result ? 'є такий посткод' : 'нема такого посткоду'?></h1>