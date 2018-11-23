<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Kareer */

$this->title = 'Создать вакансию';
$this->params['breadcrumbs'][] = ['label' => 'Kareers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kareer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
