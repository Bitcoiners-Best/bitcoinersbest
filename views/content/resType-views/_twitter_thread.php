<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="thread-module d-flex br-4 mb-30">
  <div class="pr-20">
      <img src="http://lorempixel.com/80/80" class="ew-80 card-img br-circle" alt="...">
  </div>
  <div class="flex-grow-1 align-self-center">
    <h5 class="c-white mb-10"><strong class="c-gray-1"><a class="link-white" href="{username}">username</strong></a> <span class="c-gray-1 time">@username</a> · 17m</span></h5>
    <h5 class="c-white regular mb-20">MacBook Air Refresh With Spec Bumps Said To Be Coming Tomorrow</h5>
    <h5 class="c-gray-1 regular"><a class="link" href="{thread}">View thread</a></h5>
  </div>
  <div class="align-self-top pl-20">
    <div class="votes text-center">
        <h6 class="medium mb-5 c-white"><?= $model->vote_count ?></h6>
        <button class="btn bg-brand br-circle icon-wrap">
          <span class="icon a a-link plus rounded"></span>
        </button>
    </div>
  </div>
</div>
