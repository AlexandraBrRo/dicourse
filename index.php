
<!--<form action="index.php" style="display: flex; flex-direction: column; width: 313px; height: 300px; margin: 0 auto" >-->
<!--    <label for="pass">-->
<!--        input your password-->
<!--        <input type="text"  name="pass" placeholder="password">-->
<!--    </label>-->
<!--    <button type="submit"> validate </button>-->
<!--    <p>Your password must be included this pattern "!@#$%^&*(),.?":{}|<>" and number letter</p>-->

<!--<a href="eta.php">next page</a>-->
<form action="index.php" method="post">
    <label for="postcode">
        Input your postcode
        <input name="postcode" type="text">
    </label>
    <button type="submit">get eta</button>
</form>


<?php

//use DiStudy\Configs\DbConfigsHardCode;
use DiStudy\Configs\DbConfigsJson;
use DiStudy\DbServices\Pdo\Connection;
//use DiStudy\DbServices\Pdo\Repository;
//use DiStudy\DbServices\Mysql\Connection;
//use DiStudy\DbServices\Mysql\Repository;
//use DiStudy\Validators\UpperCaseValidator;
//use DiStudy\Validators\NumberValidator;
//use DiStudy\Validators\SpecialSimbolValidator;
//use DiStudy\Validators\CompositeValidator;
use DiStudy\DbServices\PostcodeServices\PostcodeRepository;

require __DIR__ . '/vendor/autoload.php';


$configsDB = new DbConfigsJson('etaDbConfigs.json');
$connection = new Connection($configsDB);
$repositoryPostcode = new PostcodeRepository($connection, 'shipping_food');
//var_dump($repositoryPostcode->getByPostcode('1000'));
?>
<?php
if(isset($_POST['postcode'])):
   $eta = $repositoryPostcode->getByPostcode($_POST['postcode']);
?>

<h1>Best eta: <?= $eta['best_eta'] ?></h1>
<h1>Worst eta: <?= $eta['worst_eta'] ?></h1>

<?php endif; ?>








