<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer_employee */

$this->title = 'Добавить претендента';
$this->params['breadcrumbs'][] = ['label' => 'Kareer Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kareer-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'kareer'=>$kareer,
    ]) ?>

</div>
