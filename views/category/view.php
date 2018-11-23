<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Product;
USE app\models\Brand;
use yii\widgets\Pjax;
?>

<section id="advertisement">
    <div class="container">

    </div>

</section>

<section>
<div class="container">

<div class="row">
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Категория</h2>
        <ul class="catalog category-products">
            <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
        </ul>


        <ul class="catalog category-products">
<!--новый фильтр-->

            <div class="price-range">

                <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>


                <?php
                //диапазон
                ?>

                <div class="catalog">
                    <div class="form-group-filtr">
                        <?="Цена"; ?>
                        <?= $form->field($model, 'range')->widget(\kartik\slider\Slider::class, [
                            'name'=>'money',
                            'value'=>'250,650',
                            'sliderColor' => \kartik\slider\Slider::TYPE_GREY,
                            'handleColor' => \kartik\slider\Slider::TYPE_DANGER,
                            'pluginOptions' => [
                                'min' =>  $model->min,
                                'max' => $model->max,
                                'step' => 5,
                                'range' => true
                            ]
                        ])->label(false); ?>
                        <br/>
                        <b class="pull-left"><?= $model->min ?></b> <b class="pull-right"><?= $model->max ?></b>

                    </div>

                    <?php
                    $items=yii\helpers\ArrayHelper::map($brands,'id','name');
                    $params = [
                        'prompt' => 'Любой',
                    ];
                    echo "<br/>";
                    echo "<br/>";
                    echo $form->field($model, 'brand')->dropDownList($items, $params);

                    ?>


                    <?= Html::submitButton('Отправить', [
                        'class' => 'get_discount btn',
                    ]) ?>

                    <?php \yii\bootstrap\ActiveForm::end(); ?>
                </div>





                <!--конец нового фильтра -->



        </ul>



    </div>

</div>

<div class="col-sm-9 padding-right">


    <div class="features_items"><!--features_items-->
        <h2 class="title text-center"><?= $category->name?></h2>

        <div class="sorti">
            <!--сортировка-->
            <?php

            echo 'Сортировать :  '.'   '.$sort->link('name') . ' | ' . $sort->link('price'). ' | ' . $sort->link('hit'). ' | ' . $sort->link('new'). ' | ' . $sort->link('sale');

           // $products=$models;
            ?>
            <!--конец сортировки-->
        </div>

    <?php if(!empty($products)): ?>
        <?php $i = 0; foreach($products as $product): ?>
            <?php $mainImg = $product->getImage();?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $product->name])?>
                <h2><?= $product->price?> руб.</h2>
                <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name?></a></p>

                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>

            </div>

            <?php if($product->new): ?>
                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
            <?php endif?>
            <?php if($product->sale): ?>
                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
            <?php endif?>
        </div>

    </div>
</div>
            <?php $i++?>
            <?php if($i % 3 == 0): ?>
                <div class="clearfix"></div>
            <?php endif;?>
            <?php endforeach;?>
        <div class="clearfix"></div>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
        <?php else :?>
        <h2>Здесь товаров пока нет...</h2>
    <?php endif;?>
<!--<ul class="pagination">
    <li class="active"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">&raquo;</a></li>
</ul>-->
</div><!--features_items-->
</div>
</div>
</div>
</section>

<?php             // debug($brands); ?>