<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="podcast-module d-flex br-4 mb-30 fade-in">
    <div class="pr-20">
        <img src="<?= $model->image ?>" class="ew-100 card-img" alt="...">
    </div>
    <div class="flex-grow-1 align-self-center">
        <h6 class="text-uppercase c-gray-1 medium mb-15"><?= $model->created_by ?></h6>
        <h5 class="medium c-white"><?= $model->title ?></h5>
    </div>
    <div class="align-self-top pl-20">
        <div class="votes text-center">
            <h6 class="medium mb-5 c-white"><?= $model->vote_count ?></h6>
            <button class="btn bg-brand br-circle icon-wrap push-button">
              <span class="icon a a-link plus rounded"></span>
            </button>
        </div>
    </div>
</div>
