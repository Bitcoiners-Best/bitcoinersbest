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

<?php if (Yii::$app->user->isGuest) { echo $this->render('../_modals/_signin-modal'); }?>
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
          '<li class="nav-item align-self-center"><button class="overlay-trigger btn btn-rect-md push-button" data-modal="signin-modal"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.47692 8.91917H0.761182C0.309406 8.91917 -0.0459241 8.53267 0.00483732 8.09662L0.827172 0.882007C0.88301 0.381542 1.31956 0 1.83732 0H6.02514C6.74595 0 7.23834 0.708578 6.9693 1.36265L5.49215 4.95509H9.23326C9.8221 4.95509 10.1876 5.57944 9.88809 6.07495L4.01499 15.7572C3.72057 16.2378 2.96423 15.9504 3.08098 15.4054L4.47692 8.91917Z" fill="#1D2229"/>
          </svg><span class="ml-15">
Vote</span><span class="ml-10">{x}</span></button></li>'
        ),

        !Yii::$app->user->isGuest ? (
          '<img src="'.Yii::$app->user->identity->getProfilePic().'"/><li class="nav-item align-self-center">' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout',['class' => 'btn btn-rect-md logout push-button']). Html::endForm() . '</li>'
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
