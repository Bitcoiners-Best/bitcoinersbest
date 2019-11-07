<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="res-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'res_type_id')->dropDownList(\app\models\ResType::getAvailableTypesAsArray())->label('Resource Type') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group mt-50">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl push-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
