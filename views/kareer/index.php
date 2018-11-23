<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kareers';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="container">

        <?php if( !empty($kareers) ): ?>
            <div class="blog-post-area">
                <h2 class="title text-center">Карьера</h2>

                <?php foreach($kareers as $kareer): ?>

                    <div class="single-blog-post">

                        <h3><?=$kareer->vacaition ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?= $kareer->date?></li>
                            </ul>

                        </div>
                        <p class="kareer"><?=$kareer->description ?></p>

                        <p class="get_discount btn"><a href="<?= \yii\helpers\Url::to(['kareer/view', 'id' => $kareer->id]) ?>">Откликнуться на вакансию</a></p>

                    </div>
                    <div class="line"></div>
                <?php endforeach;?>


            </div>
           
        <?php else :?>
            <h2>Вакансий пока нет...</h2>
        <?php endif;?>

    </div>
</section>
