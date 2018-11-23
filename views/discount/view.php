<?php

use yii\helpers\Html;

?>
<section>
    <div class="container">

<div class="blog-post-area">
    <h2 class="title text-center"><?="Скидка" ?></h2>
    <h2 class="discount_title2 text-center"><?= $discount->title ?></h2>
    <div class="single-blog-post">
        <h3><?=$discount->description ?></h3>
        <div class="post-meta">

        </div>
        <?php $mainImg = $discount->getImage();?>
        <div class="pull-left text-pad">
        <?= Html::img($mainImg->getUrl(), ['alt' => $discount->name])?>
        </div>
        <div class="media-body">
        <p class="discount_text"> <?=$discount->text ?></p>
        </div>

    </div>
</div><!--/blog-post-area-->
    </div>
</section>