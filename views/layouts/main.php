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
        <button class="close-modal">Close</button>
        <h3 class="">Upvote {title}</h3>
        <h4 class=""><span class="c-">{#}</span> sats</h4>
        <p class="c-gray-1">All proceeds will be donated to an open-source bitcoin/lightning project</p>
        <img src="http://lorempixel.com/200/200" class="ew-200 card-img mb-30" alt="...">
        <a class="btn btn btn-lg btn-block mb-20" href="#" role="button">Copy Payment Request</a>
        <p class="mb-0 c-gray-1">Powered by <a href="">paywall.link</a></p>
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
            ['label' => 'Contact', 'url' => ['/site/contact'], 'options' => ['class' => 'nav-item align-self-center']],
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
            ['label' => 'Join', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item align-self-center']],
            (
              '<li class="nav-item align-self-center"><button class="overlay-trigger btn" data-modal="overlay-modal">⚡ Vote 10</button></li>'
            ),

    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right flex-grow-1 justify-content-end'],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>

    <div class="container mt-90">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer bg-black mt-50 pt-20 pt-20">
    <div class="container">
      <div class="d-flex">
        <p class="c-white">&copy; Bitcoiner's Best <?= date('Y') ?></p>
        <!-- <div class="pl-20 pr-20"><a href="">Terms</a></div>
        <div class="pl-20 pr-20"><a href="">Privacy</a></div> -->
        <div class="ml-auto"><a href="">@bitcoinersbest</a></div>
      </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
