<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\widgets\ListView;


$this->title = 'Content View';
?>

<?php Pjax::begin(['enablePushState' => true,'timeout'=>100000]); ?>

<div class="module-container" id="module-container">

  <!-- if podcast -->
  <div class="podcast-module d-flex br-4 mb-30">
      <div class="pr-20">
          <img src="<?= $model->image ?>" class="ew-100 card-img" alt="...">
      </div>
      <div class="flex-grow-1 align-self-center">
          <h6 class="text-uppercase c-gray-1 medium mb-15"><?= $model->created_by ?></h6>
          <h5 class="medium c-white"><?= $model->title ?></h5>
      </div>
      <div class="align-self-top pl-20">
        <div class="votes text-center">
            <button class="vote btn btn-transparent bg-brand icon-wrap">
              <svg class="push-button" width="12" height="42" viewBox="0 0 9 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.99984 0L-0.00015655 17.1C-0.100157 17.3 0.199843 17.5 0.399843 17.4L2.39984 16.2C2.89984 15.9 3.49984 16.2 3.49984 16.8L3.89984 27.4C3.89984 27.5 3.99984 27.5 3.99984 27.4L8.09984 10.2C8.19984 10 7.89984 9.8 7.69984 9.9L5.69984 11.1C5.19984 11.4 4.59984 11.1 4.59984 10.5L3.99984 0C3.99984 0 4.09984 0 3.99984 0Z" fill="#6F7C91"/>
              </svg>
              <h6 class="medium mt-10 c-white"><?= $model->vote_count ?></h6>
              <!-- <h6 class="vote-increment c-white">10</h6> -->
            </button>
        </div>
      </div>
  </div>

<!-- if episode -->

<!-- if article -->

<!-- if book -->

<!-- if thread -->

  <p class="c-white"><?= $model->created_at ?></p>

  <a class="c-white" href="">Open Episode</a>

  <a class="c-white mt-50 push-button" href="<?=\yii\helpers\Url::to(['site/auth','authclient'=>'twitter']);?>"><svg class="mr-15" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M6.24792 15.869C13.7453 15.869 17.845 9.76428 17.845 4.47072C17.845 4.29733 17.8414 4.12472 17.8335 3.95288C18.6294 3.38741 19.3211 2.68173 19.8667 1.87842C19.1364 2.19748 18.3504 2.41227 17.526 2.50912C18.3675 2.01315 19.0136 1.22859 19.3183 0.29328C18.5308 0.752146 17.6587 1.08566 16.7301 1.26569C15.9863 0.486982 14.9274 0 13.7548 0C11.5039 0 9.67854 1.79407 9.67854 4.00561C9.67854 4.31998 9.7143 4.62576 9.78424 4.91904C6.39654 4.75151 3.39267 3.15739 1.38254 0.733405C1.03249 1.32544 0.830639 2.01315 0.830639 2.74695C0.830639 4.13682 1.55022 5.36385 2.64448 6.08163C1.97576 6.06132 1.34757 5.8809 0.798454 5.58059C0.797854 5.5974 0.797855 5.61379 0.797855 5.63175C0.797855 7.57187 2.20284 9.19177 4.06794 9.55886C3.72544 9.65063 3.36505 9.69984 2.99314 9.69984C2.7309 9.69984 2.47541 9.67447 2.22707 9.62759C2.746 11.2194 4.25072 12.3777 6.03476 12.4101C4.63971 13.4848 2.88229 14.1249 0.972286 14.1249C0.643687 14.1249 0.319062 14.1065 0 14.0694C1.80391 15.2058 3.94596 15.869 6.24813 15.869" fill="white"/>
  </svg>Share on Twitter</a>

  <a class="c-white" href="">Submitted by</a>



<br>
<br>
<br>
<br>

  <div class="podcast-module d-flex br-4 mb-30">
      <div class="pr-20">
          <img src="<?= $model->image ?>" class="ew-100 card-img" alt="...">
      </div>
      <div class="flex-grow-1 align-self-center">
          <h6 class="text-uppercase c-gray-1 medium mb-15"><?= $model->created_by ?></h6>
          <h5 class="medium c-white"><?= $model->title ?></h5>
      </div>
      <div class="align-self-top pl-20">
        <div class="votes text-center">
            <button class="vote btn btn-outline btn-transparent bg-brand icon-wrap">
              <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 5.66667L5.66667 10.3333L15 1" stroke="#FFCF53" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="vote btn btn-outline btn-transparent bg-brand icon-wrap">
              <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 5.66667L5.66667 10.3333L15 1" stroke="#FFCF53" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="vote btn btn-outline btn-transparent bg-brand icon-wrap">
              <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 5.66667L5.66667 10.3333L15 1" stroke="#FFCF53" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="vote btn btn-outline btn-transparent bg-brand icon-wrap">
              <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 5.66667L5.66667 10.3333L15 1" stroke="#FFCF53" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

        </div>
      </div>
  </div>


</div>
<?php Pjax::end(); ?>
