<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">

    <h1><?php echo "Сообщение об ошибке: ".Html::encode($this->title); ?></h1>

    <div class="alert alert-danger">
        <?php echo nl2br(Html::encode($message)); ?>
    </div>

    <div class="container text-center">
<!--        <div class="logo-404">-->
<!--            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>-->
<!--        </div>-->
        <div class="content-404">
            <img src="images/404/404.png" class="img-responsive" alt="" />
            <h1><b></b>Запрошенная страница не найдена</h1>
            <h2><a href="index.html">Перейти на Главную страницу</a></h2>
        </div>
    </div>

</div>
