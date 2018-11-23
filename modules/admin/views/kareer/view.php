<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer */

$this->title = $model->vacaition;
$this->params['breadcrumbs'][] = ['label' => 'Kareers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kareer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vacaition',
            'description:ntext',
            'date'
        ],
    ]) ?>

</div>
