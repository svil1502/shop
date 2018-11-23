<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Админка|<?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <?php
        //        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
        //        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
        ?>

        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
    <?php $this->beginBody() ?>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +7 904 86 20348</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> developersvil1502@mail.ru</a></li>
                                <li><a href="#"> Сыктывкар, улица 8 Марта, 72</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <a class="btn btn-social-icon btn-vk">
                                <span class="fa fa-vk"></span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER'])?></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if(!Yii::$app->user->isGuest): ?>
                                    <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Выход)</a></li>
                                <?php endif;?>
                                
                                <li><a href="#"><i class="fa fa-lock"></i> Авторизация</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">

                                <li><a href="<?=\yii\helpers\Url::to(['/admin']) ?>">Главная админки</a></li>
                                <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['category/index'])?>">Список категорий</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['category/create'])?>">Добавить категорию</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['product/index'])?>">Список товаров</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['product/create'])?>">Добавить товар </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Бренды<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['brand/index'])?>">Список брендов</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['brand/create'])?>">Добавить бренд </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Скидки<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['discount/index'])?>">Список скидок</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['discount/create'])?>">Добавить скидку </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Блог<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['blog/index'])?>">Список статей</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['blog/create'])?>">Добавить статью</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['comment/index'])?>">Список комментариев</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Карьера<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['kareer/index'])?>">Список вакансий</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['kareer/create'])?>">Добавить вакансию</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['kareer_employee/index'])?>">Список претендентов</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Пользователь<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?=\yii\helpers\Url::to(['user/index'])?>">Список пользователей</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['user/signup'])?>">Добавить пользователя</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
<div class="container">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>
    <?= $content ?>
</div>

    <footer id="footer"><!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">

                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Быстрые покупки</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?= \yii\helpers\Url::to(['/footer/hits'])?>">Хиты продаж</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/footer/new'])?>">Новинки</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/footer/sale'])?>">Акции</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Информация для покупателя</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?= \yii\helpers\Url::to(['/footer/about'])?>">О нас</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/kareer/index'])?>">Карьера</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/place/index'])?>">Месторасположение</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/discount/index'])?>">Скидки</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">

                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2018 Автозапчасти</p>

                </div>
            </div>
        </div>

    </footer><!--/Footer-->




    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>