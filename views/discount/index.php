<?php
use yii\helpers\Html;
?>
<section>
<div class="container">

    <?php if( !empty($discounts) ): ?>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Cкидки</h2>
        <?php foreach($discounts as $discount): ?>
            <?php $mainImg = $discount->getImage();?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="well">
                        <div class="text-center">
                            <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $discount->name])?>
                            <p class="discount_title"><?=$discount->title ?></p>
                            <p class="discount_text"><?=$discount->description ?></p>
                            <p class="get_discount btn"><a href="<?= \yii\helpers\Url::to(['discount/view', 'id' => $discount->id]) ?>">Подробнее</a></p>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach;?>
    </div><!--features_items-->

    <?php
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
    <?php else :?>
        <h2>Здесь скидок пока нет...</h2>
    <?php endif;?>
</div>
</section>
