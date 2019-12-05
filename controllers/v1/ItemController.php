<?php

namespace app\controllers\v1;

use app\models\v1\V1ResItem;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class ItemController extends BaseApiController
{
    public $modelClass = 'app\models\v1\V1ResItem';

    public function actions() {
        $actions = parent::actions();
        // 'prepareDataProvider' is the only function that need to be overridden here
        $actions['index']['prepareDataProvider'] = [$this, 'indexDataProvider'];
        return $actions;
    }

    public function indexDataProvider() {
        $params = \Yii::$app->request->queryParams;

        $searchModel = new \app\models\v1\V1ResItemSearch();
        return $searchModel->search($params);
    }

    public function actionVotes($id,$user_id=null)
    {
        $class = $this->modelClass;
        $v = $class::find()->where(['id'=>$id])->one();
        if ($v && $user_id)
            return $v->getResVotes()->andWhere(['res_vote.user_id'=>$user_id])->all();

        return @$v->resVotes;
    }


}

?>