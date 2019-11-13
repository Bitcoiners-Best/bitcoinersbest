<?php

namespace app\controllers;

use app\components\AuthHandler;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\ResItem;
use app\models\ResType;
use app\models\StatusType;
use app\models\ResItemSearch;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($handle)
    {
        $user = User::find()->where(['twitter'=>$handle])->one();
        if (!$user) {
            throw new BadRequestHttpException('Can\'t find this user!');
        }
        return $this->render('index',compact('user'));
    }



}
