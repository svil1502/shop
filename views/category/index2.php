<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">

                                <h1> <img src="images/home/logo_slider300.png"   /></h1>
                                <h2>Летние скидки на зимнюю резину</h2>
                                <p>Отныне процесс выбора и приобретения зимней резины, не говоря уже о товарах других групп, становится делом приятным и комфортным </p>
                                <button type="button" class="btn btn-default get">Подробнее</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1> <img src="images/home/logo_slider300.png"   /></h1>
                                <h2>100% качество</h2>
                                <p>Самые выгодные предложения для покупателей о скидках, подарках за совершенные покупки, праздничных мероприятиях </p>
                                 <button type="button" class="btn btn-default get">Подробнее</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />

                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1> <img src="images/home/logo_slider300.png"   /></h1>
                                <h2>Розыгрыши и призы</h2>
                                <p>На сентябрьском розыгрыше в автомагазине постоянные покупатели получили ценные призы </p>
                                 <button type="button" class="btn btn-default get">Подробнее</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />

                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
<div class="container">
<div class="row">
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Категории</h2>
        <ul class="catalog category-products">
            <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
        </ul>




    </div>
</div>

<div class="col-sm-9 padding-right">
<?php if( !empty($hits) ): ?>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Товары</h2>
    <?php foreach($hits as $hit): ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                    <h2><?= $hit->price?> руб.</h2>
                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a></p>
                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                </div>
                <?php if($hit->new): ?>
                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                <?php endif?>
                <?php if($hit->sale): ?>
                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                <?php endif?>
            </div>

        </div>
    </div>
    <?php endforeach;?>
</div><!--features_items-->
<?php endif; ?>




</div>
</div>
</div>
</section>