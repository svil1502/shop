<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($form_model, 'name') ?>
<?= $form->field($form_model, 'email') ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
Имя
<?php debug($name); ?>
<?php
$js = <<<JS
 $('form').on('beforeSubmit', function(){
 var data = $(this).serialize();
 $.ajax({
 url: 'index.php?r=category/start',
 type: 'POST',
 data: data,
 success: function(res){
 console.log(res);
 },
 error: function(){
 alert('Error!');
 }
 });
 return false;
 });
JS;

$this->registerJs($js);
?>


