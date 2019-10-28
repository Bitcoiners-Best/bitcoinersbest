<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

$this->title = 'Signup';
?>

  <div class="section-header pt-20 pb-20 bg-white">
    <div class="section-header d-flex">
        <h2 class="mb-0"><?= Html::encode($this->title) ?></h2>
    </div>
  </div>

  <h3 class="mb-20 mt-20">Create an account and join the discussion</h3>
  <p class="c-gray-1">Bitcoiner's Best is a community of Bitcoin builders and makers.</p>
  <p class="c-gray-1">Discover and upvote on fresh new Bitcoin related content. Sats spent to upvote content are donated to an open source project! ⚡</p>

  <button class="btn btn-rect-xl twitter c-white mt-50">Join with Twitter</button>
