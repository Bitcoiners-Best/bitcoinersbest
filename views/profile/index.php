<?php

use yii\helpers\Html;
?>

<section class="terms-of-service mt-50 text-center fade-in">
  <div class="section-header pt-20 pb-20 c-white">
    <h1>Profile</h1>
    <h4 class="c-gray-4">@<?=$user->twitter;?></h4>
  </div>
<?=
Yii::$app->user->getIsGuest() ? '' : Html::a('Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-rect-md logout push-button']);
?>
</div>
