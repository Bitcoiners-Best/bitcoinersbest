<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

?>

<section class="login" id="signup-form-view">
    <br/>
    <div class="pricing-inner text-left">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']);
        ?>

        <?php //$form->errorSummary($model); ?>

        <?php //$form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->label('Email'); ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary login-btn', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
</section>

<div class="signin-footer signup-footer">
    <div>Already signed up? <?=Html::a('Log in',['/site/login'],['id'=>'signup-goto-login']);?></div>
</div>
