<?php

use app\models\ResItem;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\ResItem */

$this->title = 'Submit Resource';
?>

<?php
if (Yii::$app->session->getFlash('contentCreated')) {
    echo $this->render('../_modals/_contentCreated-modal');
}
?>

<section class="res-item-create mt-50 fade-in">
    <div class="section-header pb-20 text-center">
        <h1 class="mb-0 c-white">Submit<span class="mobile-hide"> your bitcoin</span> resource</h1>
        <p class="mt-10 c-gray-1">Your submission will be reviewed before it appears live.</p>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
