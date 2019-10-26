<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResItem */

$this->title = 'Update Res Item: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Res Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="res-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
