<?php

namespace app\controllers;

use app\controllers\admin\BaseAdminController;
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
class ContentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['submit'],
                'rules' => [
                    [
                        'actions' => ['submit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Creates a new ResItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSubmit()
    {
        $model = new ResItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contentCreated',TRUE);
            return $this->redirect(['']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
