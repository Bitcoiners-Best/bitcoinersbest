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
    <link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="../favicons/favicon-96x96.png"/>
    <link rel="icon" type="image/png" sizes="192x192" href="../favicons/android-icon-192x192.png"/>
    <link rel="shortcut icon" href="../favicons/favicon.ico"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('../_modals/_signin-modal'); ?>
<?php echo $this->render('../_modals/_invoice-modal'); ?>
<div class="overlay-module"></div>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
        </svg><span class="ml-15">Bitcoiners Best</span>',
        'renderInnerContainer' => true,
        'innerContainerOptions' => [
            'class' => 'container-fluid full'
        ],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg fixed-top navbar-light bg-black d-flex',
        ],
    ]);
    $menuItems = [
        ['label' => 'FAQ', 'url' => ['/site/faq'], 'options' => ['class' => 'nav-item align-self-center']],
        ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>Yii::$app->user->isGuest],
        ['label' => 'Join', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>Yii::$app->user->isGuest],
        ['label' => 'Submit', 'url' => ['/content/submit'], 'options' => ['class' => 'nav-item align-self-center'], 'visible'=>!Yii::$app->user->isGuest],
        (
          '<li class="nav-item align-self-center"><button class="overlay-trigger btn btn-rect-md push-button" data-toggle="modal" data-target="#signin-modal"><svg width="8" height="16" viewBox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.95086 0L0.019522 9.95814C-0.0787614 10.0746 0.216089 10.1911 0.412656 10.1328L2.37832 9.43403C2.86974 9.25933 3.45944 9.43403 3.45944 9.78344L3.85257 15.9563C3.85257 16.0146 3.95086 16.0146 3.95086 15.9563L7.98048 5.93995C8.07876 5.82348 7.78391 5.70701 7.58734 5.76524L5.62168 6.46406C5.13026 6.63876 4.54056 6.46406 4.54056 6.11465L3.95086 0C3.95086 0 4.04914 0 3.95086 0Z" fill="#1D2229"/>
          </svg><span class="ml-10 semibold">9999</span></button></li>'
        ),

        !Yii::$app->user->isGuest ? (
          '<li class="nav-item align-self-center"><a href="'.Yii::$app->user->identity->getProfileUrl().'"><img class="profile-picture br-circle transition" src="'.Yii::$app->user->identity->getProfilePic().'"/></a></li>'
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

<?php echo $this->render('_footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
