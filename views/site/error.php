<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<section class="error mt-50 text-center">
  <div class="section-header pt-20 pb-20 c-white text-center">
    <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="alert alert-danger">
      <?= nl2br(Html::encode($message)) ?>
  </div>
</section>
