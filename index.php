
<!--<form action="index.php" style="display: flex; flex-direction: column; width: 313px; height: 300px; margin: 0 auto" >-->
<!--    <label for="pass">-->
<!--        input your password-->
<!--        <input type="text"  name="pass" placeholder="password">-->
<!--    </label>-->
<!--    <button type="submit"> validate </button>-->
<!--    <p>Your password must be included this pattern "!@#$%^&*(),.?":{}|<>" and number letter</p>-->

<a href="eta.php">next page</a>
<a href="findPostcod.php">next page</a>

<?php

use DiStudy\Configs\DbConfigsHardCode;
use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Pdo\Connection;
use DiStudy\DbServices\Pdo\Repository;
//use DiStudy\DbServices\Mysql\Connection;
//use DiStudy\DbServices\Mysql\Repository;
use DiStudy\Validators\UpperCaseValidator;
use DiStudy\Validators\NumberValidator;
use DiStudy\Validators\SpecialSimbolValidator;
use DiStudy\Validators\CompositeValidator;
use DiStudy\DbServices\PostcodeServices\PostcodeRepository;
use DiStudy\inputValidators\NotEmpty;
use DiStudy\inputValidators\NumberInputValidator;
use DiStudy\inputValidators\NumberCountValidator;
use DiStudy\inputValidators\InputsValidator;

use DiStudy\Container;
$container = new Container();
$container->set('DbConfigJson', function ($container){
    new DbConfigsJson($container);
});


require __DIR__ . '/vendor/autoload.php';


$configsDB = new DbConfigsJson('etaDbConfigs.json');
$connection = new Connection($configsDB);
//$connection->make()->query();
$repositoryPostcode = new PostcodeRepository($connection, 'shipping_food');
$postcode = $repositoryPostcode->getAllPostcode();
if(isset($_POST['postcode'])){
    $eta = $repositoryPostcode->getByPostcode($_POST['postcode']);
}



$notEmpty = new NotEmpty();
$numberInput = new NumberInputValidator();
$countValidator = new NumberCountValidator('');


?>
<?php
//if($notEmpty->validate($_POST['postcode'] && $numberInput->validate($_POST['postcode'])
//&& $countValidator->validate($_POST['postcode']))):
//    if($inputsValidator->validate($_POST['postcode'])) :

?>
<form action="index.php" method="post">
    <label for="postcode">
        Input your postcode
        <select name="postcode">
            <?php foreach ($postcode as $item) {
                ?> <option <?= isset($_POST['postcode']) && $item['postcode'] === $_POST['postcode'] ?  "selected" : "" ?>  value="<?=  $item['postcode'] ?>"><?=  $item['postcode'] ?></option>  <?php
            } ?>
        </select>
    </label>
    <button type="submit">get eta</button>
</form>

<?php if(isset($eta)) {?>
    <h1>Best eta: <?= $eta !== [] ? $eta['best_eta']  : "no settings for " . $_POST['postcode'] ?></h1>
    <h1>Worst eta: <?= $eta !== [] ? $eta['worst_eta']  : "no settings for " . $_POST['postcode'] ?></h1>
<?php } ?>



<?php //else: ?>
<!--    <h1>Please input your postcode!</h1>-->
<?php //endif; ?>








