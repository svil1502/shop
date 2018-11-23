<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer_employee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kareer Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kareer-employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'kareer_id',
                'value' => function($data){
                    return $data->kareer->vacaition;
                },
            ],

            'name',
            'phone',
            'email:email',
        ],
    ]) ?>

</div>
