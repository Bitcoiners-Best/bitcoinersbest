<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResItem */

$this->title = 'Submit Resource';
?>
<div class="res-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
