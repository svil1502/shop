<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>
<?= $form->field($form_model, 'name') ?>
<?= $form->field($form_model, 'email') ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
Имя

<?php
$js = <<<JS
 $('form').on('beforeSubmit', function(e){
     url = e.currentTarget;
 var data = $(this).serialize();
 $.ajax({
 url: url,
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

<button class="btn success" id="bot">Отправить число</button>
<?php
//$js = <<<JS
//$('#bot').on('click', function(e){
//url = e.currentTarget; // Линк берем из ссылки
//var id = '123';
//console.log(url,id);
//$.ajax({
//url: url,
//data: {id: id},
//type: 'GET',
//success: function(res){
//if(!res) alert('Ошибка!');
//
//},
//error: function(){
//alert("Error222");
//console.log(url,id);
//}
//});
//return false;
//});
//JS;
//
//$this->registerJs($js);
?>