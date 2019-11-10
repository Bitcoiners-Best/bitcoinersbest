<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\widgets\ListView;


$this->title = 'Home';
?>

<?php
// reloads the container when a resource is selected
$this->registerJs(
  '$.pjax("#w0 a", "#w0", {"push":true,"replace":false,"timeout":10000,"scrollTo":false});'
);
?>


<?php Pjax::begin(['enablePushState' => false]); ?>

<div class="section-selector">
    <div class="d-flex justify-content-center pt-30 pb-30 text-uppercase">
        <a href="" class="module-navigation-element active" href="">Threads</a>
        <a class="module-navigation-element" href="">Episodes</a>
        <a class="module-navigation-element" href="">Articles</a>
        <a class="module-navigation-element" href="">Podcasts</a>
        <a class="module-navigation-element" href="">Books</a>
    </div>
</div>

<div class="module-container" id="module-container">
<!--
TODO: The num vote should be mapped, and increment +1 and 10x respectively, with the session & state maintained
-->

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model, $key, $index, $widget) {

          //generates view resType-views/_article, view resType-views/_podcast_episode etc
          $view = 'resType-views/_'.$model->resType->name;

          return $this->render($view,['model'=>$model]);
    },
    'summary'=>'',
]) ?>

<?php Pjax::end(); ?>
