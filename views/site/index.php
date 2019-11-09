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
$this->registerJs(
  ''// TODO: The PJAX container reload call when the resource type selector changes
);
?>

<?php Pjax::begin(['enablePushState' => false]); ?>

<!--
TODO 1: Selecting a new resource type from the menu below should update .module-container with the properly filtered entries (PJAX call above)
-->

<div class="module-container" id="module-container">

  <!--
  TODO: This section should only ouput based on the resource type selected about to a specific partial

  TODO: The num vote should be mapped, and increment +1 and 10x respectively, with the session & state maintained

  TODO: Isolate all of the resource types in their own _partials
  -->

  <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => '_episode',
  ]) ?>

  <div class="article-module d-flex br-4 mb-30">
      <div class="flex-grow-1 align-self-center">
          <img src="http://lorempixel.com/400/160" class="card-img" alt="...">
          <h6 class="text-uppercase c-gray-1 medium mt-25 mb-15">TALES FROM THE CRYPT</h6>
          <h5 class="medium mb-15 c-white">Tales from the Crypt #34: Murad Mahmudov</h5>
          <h5 class="regular c-gray-1">With the price of a bitcoin surging to new highs in 2019, the bullish case for investors might seem so obvious it does not need...</h5>
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
              <h6 class="medium mb-5 c-white">535</h6>
              <button class="btn bg-brand br-circle icon-wrap pop-button">
                <span class="icon a a-link plus rounded"></span>
              </button>
          </div>
      </div>
  </div>




  <div class="book-module d-flex br-4 mb-30">
      <div class="pr-20">
          <img src="http://lorempixel.com/100/160" class="ew-100 card-img" alt="...">
      </div>
      <div class="flex-grow-1 align-self-center">
          <h6 class="text-uppercase c-gray-1 medium mb-15">SAIFEDEAN AMMOUS</h6>
          <h5 class="medium c-white">The Bitcoin Standard: A Really Long Title Element That Will Eventually Wrap To Test The Limits Of</h5>
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
              <h6 class="medium mb-5 c-white">535</h6>
              <button class="btn bg-brand br-circle icon-wrap">
                <span class="icon a a-link plus rounded"></span>
              </button>
          </div>
      </div>
  </div>

  <div class="podcast-module d-flex br-4 mb-30">
      <div class="pr-20">
          <img src="http://lorempixel.com/100/100" class="ew-100 card-img" alt="...">
      </div>
      <div class="flex-grow-1 align-self-center">
          <h6 class="text-uppercase c-gray-1 medium mb-15">MARY BENT</h6>
          <h5 class="medium c-white">Tales from the Crypt</h5>
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
              <h6 class="medium mb-5 c-white">535</h6>
              <button class="btn bg-brand br-circle icon-wrap">
                <span class="icon a a-link plus rounded"></span>
              </button>
          </div>
      </div>
  </div>

  <div class="thread-module d-flex br-4 mb-30">
      <div class="pr-20">
          <img src="http://lorempixel.com/80/80" class="ew-80 card-img br-circle" alt="...">
      </div>
      <div class="flex-grow-1 align-self-center">

          <h5 class="c-white mb-10"><strong class="c-gray-1"><a class="link-white" href="{username}">username</strong></a> <span class="c-gray-1 time">@username</a> · 17m</span></h5>
          <h5 class="c-white regular mb-20">MacBook Air Refresh With Spec Bumps Said To Be Coming Tomorrow</h5>
          <h5 class="c-gray-1 regular"><a class="link" href="{thread}">View thread</a></h5>
          <!-- <h5 class="c-gray-1 regular"><a class="link" href="">Linked element</a> by <a class="link" href="">@username</a></h5> -->
      </div>
      <div class="align-self-top pl-20">
          <div class="votes text-center">
              <h6 class="medium mb-5 c-white">535</h6>
              <button class="btn bg-brand br-circle icon-wrap">
                <span class="icon a a-link plus rounded"></span>
              </button>
          </div>
      </div>
  </div>

</div>
<?php Pjax::end(); ?>
