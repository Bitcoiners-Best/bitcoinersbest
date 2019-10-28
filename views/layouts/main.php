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
        'brandLabel' => 'Bitcoiners Best',
        'renderInnerContainer' => true,
        'innerContainerOptions' => [
            'class' => 'container'
        ],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg fixed-top navbar-light bg-white d-flex',
        ],
    ]);
    $menuItems = [
            ['label' => 'About', 'url' => ['/site/about'], 'options' => ['class' => 'nav-item align-self-center']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item align-self-center']]
            ) : (
                '<li class="align-self-center">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            ['label' => 'Join', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item align-self-center btn-outline']],
            (
              '<li class="nav-item align-self-center"><button class="overlay-trigger btn btn-rect-md" data-modal="overlay-modal">⚡ Vote 10</button></li>'
            ),
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right flex-grow-1 justify-content-end'],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer bg-black">
    <div class="container">
      <div class="d-flex">
          <div class="flex-grow-1 flex-row">
            <h6 class="c-white">&copy; Bitcoiner's Best <?= date('Y') ?><a class="link ml-20" href="">Terms</a><a class="link ml-20" href="">Privacy</a></h6>
          </div>
          <h6 class="c-white m-0"><a class="link" href="bitcoinersbest@pm.me">Contact</a></h6>
          <h6 class="c-white m-0"><a class="link" href="">@bitcoinersbest</a></h6>
      </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
