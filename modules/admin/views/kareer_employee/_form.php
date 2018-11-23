<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer_employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kareer-employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kareer_id')->dropDownList(
        ArrayHelper::map($kareer, 'id', 'vacaition')
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
