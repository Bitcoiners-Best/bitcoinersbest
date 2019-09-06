<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

?>
<div class="site-login">
    <div class="site-login-container">
        <h2 class="pricing-title">Sign up for bitcoiners best</h2>
        <?=$this->render('_signup-form',compact('model'));?>
    </div>
</div>
