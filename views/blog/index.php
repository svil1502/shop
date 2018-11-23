<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use himiklab\sitemap\behaviors\SitemapBehavior;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="container">
        <?php if( !empty($blogs) ): ?>
<div class="blog-post-area">
    <h2 class="title text-center">Блог</h2>
    <?php foreach($blogs as $blog): ?>
        <?php $mainImg = $blog->getImage();?>
    <div class="single-blog-post">

        <h3><?=$blog->name ?></h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-calendar"></i><?= $blog->date?></li>
            </ul>

        </div>
        <a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $blog->id]) ?>">
            <?= Html::img($mainImg->getUrl(), ['alt' => $blog->name])?>
        </a>
        <p><?=$blog->description ?></p>

        <p class="get_discount btn"><a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $blog->id]) ?>">Подробнее</a></p>

    </div>
    <?php endforeach;?>


</div>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
        <?php else :?>
            <h2>Здесь статей пока нет...</h2>
        <?php endif;?>
</div>
</section>