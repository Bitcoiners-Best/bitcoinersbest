<?php

use yii\helpers\Html;
?>

<section class="terms-of-service mt-50 text-center fade-in">
  <div class="section-header pt-20 pb-20 c-white">
    <a href="<?= Yii::$app->user->identity->getProfileUrl(); ?>">
      <img class="ew-100 br-circle transition" src="<?= Yii::$app->user->identity->getProfilePic(); ?>">
      <h4 class="c-gray-4 mt-20">@<?=$user->twitter;?></h4>
    </a>
  </div>
<?=
Yii::$app->user->getIsGuest() ?
  ''
  :
  ''
  .Html::a('Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-rect-md logout push-button']).
  '';
?>
</div>
