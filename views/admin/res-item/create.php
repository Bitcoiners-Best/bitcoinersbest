<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResItem */

$this->title = 'Submit Resource';
?>

<section class="res-item-create mt-50">
  <div class="section-header pt-20 pb-20 text-center">
    <h1 class="mb-0 c-white"><?= Html::encode($this->title) ?></h1>
    <p class="mt-10 c-gray-1">Your submission will be reviewed before it appears live.</p>
  </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
