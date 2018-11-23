<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;


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
                            <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                        </ul>
                        <p><?= $commen->text ?></p>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <?php Pjax::end() ?>
        </div><!--/Response-area-->



        <div class="comment-form">
            <?php Pjax::begin(['id' => 'new_note']) ?>
            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

            <?= $form->field($comment, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($comment, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($comment, 'text')->textarea(['rows' => 6]) ?>


            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?>
        </div>



        <div class="replay-box">
            <div class="row">


                <?php Pjax::begin(['id' => 'new_note']) ?>
                <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'replay-box row col-sm-4 form']]); ?>
                <div class="col-sm-12">
                    <h2>Оставьте комментарий: </h2>
                    <form>
                        <div class="blank-arrow">
                            <label>Ваше имя</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'name')->textInput(['maxlength' => true]) ?>


                        <div class="blank-arrow">
                            <label>Ваш Email</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'email')->textInput(['maxlength' => true]) ?>

                    </form>
                </div>
                <div class="col-sm-8">
                    <div class="text-area">
                        <div class="blank-arrow">

                            <label>Ваш комментарий</label>
                        </div>
                        <span>*</span>
                        <?= $form->field($comment, 'text')->textarea(['rows' => 11]) ?>
                        <a> <?= Html::submitButton('Отправить комментарий', ['class' => 'btn btn-primary']) ?></a>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
                <?php Pjax::end() ?>

            </div>
        </div>





        <div class="replay-box">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Leave a replay</h2>
                    <form>
                        <div class="blank-arrow">
                            <label>Your Name</label>
                        </div>
                        <span>*</span>
                        <input type="text" placeholder="write your name...">
                        <div class="blank-arrow">
                            <label>Email Address</label>
                        </div>
                        <span>*</span>
                        <input type="email" placeholder="your email address...">
                        <div class="blank-arrow">
                            <label>Web Site</label>
                        </div>
                        <input type="email" placeholder="current city...">
                    </form>
                </div>
                <div class="col-sm-8">
                    <div class="text-area">
                        <div class="blank-arrow">
                            <label>Your Name</label>
                        </div>
                        <span>*</span>
                        <textarea name="message" rows="11"></textarea>
                        <a class="btn btn-primary" href="">post comment</a>
                    </div>
                </div>
            </div>
        </div><!--/Repaly Box-->


    </div>
</section>
<?php

?>