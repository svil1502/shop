<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kareer-form">


<!--    --><?php
//    if(!$title = $model->seo->title) {
//        $title = "Купить {$model->vacaition} в Кургане в магазине «Шоп45»";
//    }
//
//    if(!$description = $model->seo->description) {
//        $description = 'Страница '.$model->vacaition;
//    }
//
//    if(!$keywords = $model->seo->keywords) {
//        $keywords = '';
//    }
//
//    $this->title = $title;
//
//    $this->registerMetaTag([
//        'name' => 'description',
//        'content' => $description,
//    ]);
//
//    $this->registerMetaTag([
//        'name' => 'keywords',
//        'content' => $keywords,
//    ]);
//    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?=\pistol88\seo\widgets\SeoForm::widget([
        'model' => $model,
        'form' => $form,
    ]); ?>
    <?= $form->field($model, 'vacaition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),[
        'name' => 'date_10',
        'language' => 'ru',
        'options' => ['placeholder' => 'Введите дату ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
