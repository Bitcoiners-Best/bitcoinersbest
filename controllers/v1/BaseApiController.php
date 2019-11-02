<?php

namespace app\controllers\v1;

use app\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

use Yii;
use yii\web\UnauthorizedHttpException;
use \app\models\v1\V1User;

class BaseApiController extends ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];
        $behaviors['rateLimiter']['enableRateLimitHeaders'] = false;
        return $behaviors;
    }

    public function checkAdminAccess()
    {
        if (Yii::$app->user->identity->status >= User::STATUS_API_ADMIN)
            return true;
        else
            throw new UnauthorizedHttpException('You do not have permission to do this!');
    }

    public function getUser()
    {
        return V1User::findOne(Yii::$app->user->id);
    }

}
