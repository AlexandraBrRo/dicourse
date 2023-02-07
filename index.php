
<!--<form action="index.php" style="display: flex; flex-direction: column; width: 313px; height: 300px; margin: 0 auto" >-->
<!--    <label for="pass">-->
<!--        input your password-->
<!--        <input type="text"  name="pass" placeholder="password">-->
<!--    </label>-->
<!--    <button type="submit"> validate </button>-->
<!--    <p>Your password must be included this pattern "!@#$%^&*(),.?":{}|<>" and number letter</p>-->

<!--<a href="eta.php">next page</a>-->

<?php

//use DiStudy\Configs\DbConfigsHardCode;
use DiStudy\Configs\DbConfigsJson;

//use DiStudy\DbServices\Pdo\Connection;
//use DiStudy\DbServices\Pdo\Repository;
use DiStudy\DbServices\Mysql\Connection;
//use DiStudy\DbServices\Mysql\Repository;
//use DiStudy\Validators\UpperCaseValidator;
//use DiStudy\Validators\NumberValidator;
//use DiStudy\Validators\SpecialSimbolValidator;
//use DiStudy\Validators\CompositeValidator;
use DiStudy\DbServices\PostcodeServices\PostcodeRepository;
use DiStudy\inputValidators\NotEmpty;
use DiStudy\inputValidators\NumberInputValidator;
use DiStudy\inputValidators\NumberCountValidator;
use DiStudy\inputValidators\InputsValidator;

require __DIR__ . '/vendor/autoload.php';


$configsDB = new DbConfigsJson('etaDbConfigs.json');
$connection = new Connection($configsDB);
//$connection->make()->query();
$repositoryPostcode = new PostcodeRepository($connection, 'shipping_food');
//var_dump($repositoryPostcode->getByPostcode('1000'));
$notEmpty = new NotEmpty();
$numberInput = new NumberInputValidator();
$countValidator = new NumberCountValidator();
$validators = [
    new NotEmpty(),
    new NumberInputValidator(),
    new NumberCountValidator()
];
$inputsValidator = new InputsValidator($validators);

echo $val = $validators[0]->validate('') ? 'Not empty' : 'empty';

$eta = $repositoryPostcode->getByPostcode($_POST['postcode']);
$postcode = $repositoryPostcode->getAllPostcode('');

$input = $_GET['postcode'];
$setCode = $repositoryPostcode->set($_GET['postcode'], ['besteta'], ['worsteta']);


?>
<?php
//if($notEmpty->validate($_POST['postcode'] && $numberInput->validate($_POST['postcode'])
//&& $countValidator->validate($_POST['postcode']))):
//    if($inputsValidator->validate($_POST['postcode'])) :

?>
<form action="index.php" method="post">
    <label for="postcode">
        Input your postcode
<!--        <input name="postcode" type="text">-->
        <select name="postcode">
            <?php foreach ($postcode as $item){
            ?>
                <option value="<?= $item ?>"><?= $item ?></option><?php
            } ?>

        </select>
    </label>
    <button type="submit">get eta</button>
</form>

<form action="index.php" method="get">
    <label for="postcode">
        Input your postcode
        <select name="postcode">
            <option value=""></option>
        </select>
        <select name="postcode">
            <?php foreach ($postcode as $setCode){

            ?>
            <option value=""<?= $setCode->validate($_GET['postcode'], ['besteta'], ['worsteta'])?>></option><?php
            } ?>
        </select>
    </label>
    <button type="submit">get eta</button>
</form>

<h1>Best eta: <?= $eta !== [] ? $eta['best_eta'] : "no settings for" . $_POST['postcode'] ?></h1>
<h1>Worst eta: <?= $eta !== [] ? $eta['worst_eta'] : "no settings for" . $_POST['postcode'] ?></h1>

<?php //else: ?>
<!--    <h1>Please input your postcode!</h1>-->
<?php //endif; ?>








