<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<?php

//echo '<style>#slider { display:none;}</style>';
?>
<?php if(!empty($discounts)): ?>
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
                    <?php
//
//
//                    $first = reset($discounts);
//
//                   foreach($discounts as $discount) {
//                       if ($discount['id'] != $first['id']) {
//echo $discount['id'] ;
//                   }
//
//                    echo "<br/>";
//                    }
//

                    ?>




                    <div class="carousel-inner">


                        <div class="item active">
                      <?php $first = reset($discounts); ?>

                            <?php  $mainImg = $first->getImage();?>
                            <div class="col-sm-6">
                                <h1> <img src="images/home/logo_slider300.png"   /></h1>
                                <h2><?= $first->title ?> </h2>
                                <p><?= $first->description ?> </p>
                                <p class="get_discount btn"><a href="<?= \yii\helpers\Url::to(['discount/view', 'id' => $first->id]) ?>">Подробнее</a></p>
                            </div>
                            <div class="col-sm-6">
                                <?= Html::img($mainImg->getUrl(), ['alt' => $first->name])?>
                            </div>

                        </div>
                           <?php foreach($discounts as $discount): ?>
                            <?php $mainImg = $discount->getImage();?>
                            <?php   if ($discount['id'] != $first['id']): ?>

                            <div class="item">

                                <div class="col-sm-6">
                                    <h1> <img src="images/home/logo_slider300.png"   /></h1>
                                    <h2><?= $discount->title ?> </h2>
                                    <p><?= $discount->description ?> </p>
                                    <p class="get_discount btn"><a href="<?= \yii\helpers\Url::to(['discount/view', 'id' => $discount->id]) ?>">Подробнее</a></p>

                                </div>
                                <div class="col-sm-6">
                                    <?= Html::img($mainImg->getUrl('484x441'), ['alt' => $discount->name])?>
                                </div>

                            </div>
                                   <?php endif; ?>
                        <?php endforeach;?>
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
<?php else :?>
    <?php echo '<style>#slider { display:none;}</style>'; ?>
<?php endif; ?>
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
        <?php $mainImg = $hit->getImage();?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $hit->name])?>
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