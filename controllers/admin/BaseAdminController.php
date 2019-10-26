<?php

namespace app\controllers\admin;

use Yii;
use app\models\ResItem;
use app\models\ResItemSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResItemController implements the CRUD actions for ResItem model.
 */
class BaseAdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'matchCallback' => function ($rule, $action) {
                            return (stripos(Yii::$app->user->identity->authKey, "admin-") !== false);
                        }
                    ],
                ],
            ]
        ];
    }
}