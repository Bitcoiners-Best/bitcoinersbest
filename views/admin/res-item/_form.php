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

    <div class="resource-type 20">
      <h2 class="mb-20">Podcast</h2>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
      <div class="form-group mt-40">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl']) ?>
      </div>
    </div>

    <div class="resource-type 25">
      <h2 class="mb-20">Episode</h2>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
      <div class="form-group mt-40">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl']) ?>
      </div>
    </div>

    <div class="resource-type 30">
      <h2 class="mb-20">Article</h2>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
      <div class="form-group mt-40">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl']) ?>
      </div>
    </div>

    <div class="resource-type 35">
      <h2 class="mb-20">Book</h2>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
      <div class="form-group mt-40">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl']) ?>
      </div>
    </div>

    <div class="resource-type 40">
      <h2 class="mb-20">Twitter Thread</h2>
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'rss')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
      <div class="form-group mt-40">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-rect-xl']) ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
