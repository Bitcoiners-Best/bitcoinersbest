<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

$this->title = 'Signup';
?>

<div class="site-login">
    <div class="site-login-container">
        <h2><?= Html::encode($this->title) ?></h2>

        <p>Create an account and join the discussion</p>
        <p>Bitcoiner's Best is a community of Bitcoin builders and makers.</p>

        <p>Discover and upvote on fresh new Bitcoin related content. Sats spent to upvote content are donated to an open source project! ⚡</p>

        <?=$this->render('_signup-form',compact('model'));?>
    </div>
</div>
