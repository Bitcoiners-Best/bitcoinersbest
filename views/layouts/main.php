<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="modal-full overlay-effect" id="overlay-modal">
    <div class="overlay-content bg-white br-4 text-center">
      <button class="close-modal btn br-circle icon-wrap">
        <span class="icon a a-link close rounded"></span>
      </button>
        <h3 class="c-black">Upvote {title}</h3>
        <h4 class="mb-20 c-black"><span class="c-brand">{#}</span> sats</h4>
        <h6 class="c-gray-1 mb-20">All proceeds will be donated to an open-source bitcoin/lightning project</h6>
        <img src="http://lorempixel.com/200/200" class="ew-200 card-img mb-30" alt="...">
        <a class="btn btn-rect-lg btn-block mb-20" href="#">Copy Payment Request</a>
        <h6 class="mb-0 c-gray-1">Powered by <a class="link" href="">paywall.link</a></h6>
    </div>
</div>
<div class="overlay-module"></div>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
        </svg><span class="ml-15">Bitcoiners Best</span>',
        'renderInnerContainer' => true,
        'innerContainerOptions' => [
            'class' => 'container-fluid'
        ],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg fixed-top navbar-light bg-black d-flex',
        ],
    ]);
    $menuItems = [
            ['label' => 'FAQ', 'url' => ['/site/about'], 'options' => ['class' => 'nav-item align-self-center']],
            ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Join', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Submit', 'url' => ['/content/submit'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>!Yii::$app->user->isGuest],
            (
              '<li class="nav-item align-self-center"><button class="overlay-trigger btn btn-rect-md" data-modal="overlay-modal"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.47692 8.91917H0.761182C0.309406 8.91917 -0.0459241 8.53267 0.00483732 8.09662L0.827172 0.882007C0.88301 0.381542 1.31956 0 1.83732 0H6.02514C6.74595 0 7.23834 0.708578 6.9693 1.36265L5.49215 4.95509H9.23326C9.8221 4.95509 10.1876 5.57944 9.88809 6.07495L4.01499 15.7572C3.72057 16.2378 2.96423 15.9504 3.08098 15.4054L4.47692 8.91917Z" fill="#121212"/>
              </svg><span class="ml-15">
 Vote</span><span class="ml-10">{x}</span></button></li>'
            ),

            !Yii::$app->user->isGuest ? (
              '<li class="align-self-center">' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout',['class' => 'btn logout']). Html::endForm() . '</li>'
            ) : (
              ''
            ),

    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right flex-grow-1 justify-content-end'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
</div>

<footer class="footer bg-black">
    <div class="container-fluid">
      <div class="d-flex pb-30 pt-30">
          <div class="flex-grow-1 flex-row">
            <h6 class="c-white">&copy; Bitcoiner's Best <?= date('Y') ?><a class="link ml-20" href="">Terms</a><a class="link ml-20" href="">Privacy</a></h6>
          </div>
          <h6 class="c-white m-0"><a class="link" href="bitcoinersbest@pm.me">Contact</a></h6>
          <h6 class="c-white m-0"><a class="link" target="_blank" href="https://twitter.com/bitcoiners_best">@bitcoiners_best</a></h6>
      </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
