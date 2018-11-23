<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use himiklab\sitemap\behaviors\SitemapBehavior;


?>
<section>
    <div class="container">
<div class="blog-post-area">

						<h2 class="title text-center">Блог</h2>
						<div class="single-blog-post">
							<h3><?=$blog->name ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> <?=$blog->date ?></li>
								</ul>
							</div>
                            <?php $mainImg = $blog->getImage();?>
							<a>
                                <?= Html::img($mainImg->getUrl(), ['alt' => $blog->name])?>

							</a>
							<p><?=$blog->text?></p>
							
						</div>
					</div><!--/blog-post-area-->

        <div class="response-area">
            <h2>Комментарии</h2>
            <?php Pjax::begin(['id' => 'notes']) ?>
            <ul class="media-list">
                <?php foreach($comments as $commen): ?>
                <li class="media">
                    <div class="media-body">

                        <ul class="sinlge-post-meta">
                            <li><i class="fa fa-user"></i><?= $commen->name ?></li>
                            <li><i class="fa fa-calendar"></i><?= $commen->date ?></li>
                        </ul>
                        <p><?= $commen->text ?></p>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <?php Pjax::end() ?>
        </div><!--/Response-area-->







        <div class="replay-box">
            <div class="row">


                <?php Pjax::begin(['id' => 'new_note']) ?>
                <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'replay-box row']]); ?>

                <div class="col-sm-12">
                    <h2>Оставьте комментарий: </h2>

                        <div class="blank-arrow">
                            <label>Ваше имя</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'name')->textInput(['maxlength' => true])->label(false, ['style'=>'display:none']) ?>


                        <div class="blank-arrow">
                            <label>Ваша электронная почта</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'email')->textInput(['maxlength' => true])->label(false, ['style'=>'display:none']) ?>



                    <div class="text-area">
                        <div class="blank-arrow">

                            <label>Ваш комментарий</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'text')->textarea(['rows' => 11])->label(false, ['style'=>'display:none']) ?>


                        <a> <?= Html::submitButton('Отправить комментарий', ['class' => 'get_discount btn']) ?></a>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
                <?php Pjax::end() ?>

            </div>
        </div>

<?php


?>

    </div>
</section>
<?php

?>