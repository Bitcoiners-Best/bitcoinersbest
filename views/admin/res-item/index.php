<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resource', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'resType.display_name',
            'title',
            'description',
            //'image',
            //'rss',
            'url:url',
            //'vote_count',
            //'status_type_id',
            //'data:ntext',
            //'created_at',
            //'created_by',
            'submittedBy.username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
