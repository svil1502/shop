<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
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

    <?php
    $mainImg = $product->getImage();

    ?>


    <div class="col-sm-9 padding-right">
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <?= Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
        </div>


    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <?php if($product->new): ?>


                <?= Html::img("@web/images/product-details/new.jpg", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
            <?php endif?>
            <?php if($product->sale): ?>
                <?= Html::img("@web/images/product-details/sale.jpg", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
            <?php endif?>
            <h2><?= $product->name?></h2>


								<span>
									<span><?= $product->price?> руб.</span>
                                    <span><label class="minim">Количество:</label></span>
									<input type="text" value="1" id="qty" />
                                    <span>
									<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault add-to-cart cart">

                                        <i class="fa fa-shopping-cart"></i>
                                        Добавить в корзину
                                    </a>
                                    </span>
								</span>


            <p><b>Категория:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>

            <p><b>Бренд:</b> <a href="<?= \yii\helpers\Url::to(['brand/view', 'id' => $product->brand->id]) ?>"><?= $product->brand->name?></a></p>

            <?=$product->content;
            ?>


        </div><!--/product-information-->
    </div>



</div>
</div>
</div>
</section>