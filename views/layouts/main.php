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
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <meta name="yandex-verification" content="097e6a4a75d3818e" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
  ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122265742-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122265742-1');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter49582984 = new Ya.Metrika2({
                        id:49582984,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/49582984" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//ilin.itcrk.ru/shop2/web/analytics/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
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
                            <li><a href="#"><i class="fa fa-phone"></i> +7 904 86 21343</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> developersvil1502@mail.ru</a></li>
                            <li><a href="#"> Сыктывкар, улица Автодорожная, 72</a></li>
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
            Cайт тестируется, интернет-магазин не работает
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.png', ['alt' => 'Автозапчасти'])?></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(!Yii::$app->user->isGuest): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Выход)</a></li>
                            <?php endif;?>
                            <li><?= Html::a('<i class="fa fa-shopping-cart"></i> Корзина',['cart/show'], ['class' => 'fart', 'title' => 'Корзина']) ?></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/admin']) ?>"><i class="fa fa-lock"></i>Авторизация</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">

            <div class="row">
                <div class="col-sm-9">
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
                            <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?= \yii\helpers\Url::home()?>">Магазин</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['discount/index'])?>">Скидки</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to(['blog/index'])?>">Блог</a>

                            </li>

                            <li><a href="<?= \yii\helpers\Url::to(['place/index'])?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="Поиск" name="q">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
<?php //if( Yii::$app->session->hasFlash('success') ): ?>
<!--    <div class="alert alert-success alert-dismissible" role="alert">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--        --><?php //echo Yii::$app->session->getFlash('success'); ?>
<!--    </div>-->
<?php //endif;?>
<?= $content ?>

<footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Быстрые покупки</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to(['footer/hits'])?>">Хиты продаж</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['footer/new'])?>">Новинки</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['footer/sale'])?>">Акции</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Информация для покупателя</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?= \yii\helpers\Url::to(['footer/about'])?>">О нас</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['kareer/index'])?>">Карьера</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['place/index'])?>">Месторасположение</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['discount/index'])?>">Скидки</a></li>

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

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a  href="' . \yii\helpers\Url::to(['cart/view']) . '"  class="btn btn-success"> Оформить заказ</a>
           <a  href="' . \yii\helpers\Url::to(['cart/clear']) . '"  class="btn btn-danger cart-del"> Очистить корзину</a>
        '
]);

\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>