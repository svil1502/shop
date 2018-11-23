<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\assets\AppAsset;
use app\assets\FontAwesomeAsset;
use app\assets\FontCss;
use yii\helpers\Html;

use rmrevin\yii\fontawesome\FA;



rmrevin\yii\fontawesome\AssetBundle::register($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title><?=Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <?=Html::a('Привет',['test/page']) ?>
            </li>

            <li class="nav-item" >


              <?=Html::a('Главная','../web/') ?>
            </li>

        </ul>
        <p>  <i class="fa fa-home"></i>примерный текст</p>

        <?php
        //echo FA::icon('home'); ?>

        <?=$content ?>



    </div>
</div>

<?php $this->endBody()  ?>
</body>
</html>
<?php $this->endPage() ?>