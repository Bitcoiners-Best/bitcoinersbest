<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>

<div class="section-header pt-20 pb-20 bg-white">
  <div class="section-header d-flex">
      <h2 class="mb-0"><?= Html::encode($this->title) ?></h2>
  </div>
</div>

<button class="btn btn-rect-xl twitter c-white mt-50 mb-50">Login with Twitter</button>


<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
<p>You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.</p>
