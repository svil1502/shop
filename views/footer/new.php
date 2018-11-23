<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<?php

//echo '<style>#slider { display:none;}</style>';
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



            <div class="col-sm-9 padding-right">
                <?php if( !empty($news) ): ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Новинки</h2>
                    <?php foreach($news as $hit): ?>
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





            </div>
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
            <?php else :?>
                <h2>Здесь товаров пока нет...</h2>
            <?php endif; ?>
        </div>
    </div>
</section>