<?php

namespace app\controllers;

use app\controllers\admin\BaseAdminController;
use app\models\ResType;
use Yii;
use app\models\ResItem;
use app\models\ResItemSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $resTypeName = Yii::$app->request->pathInfo;
        $resTypeObject = ResType::find()->where(['name'=>$resTypeName])->one();

        $params['ResItemSearch']['res_type_id'] = $resTypeObject->id;
        $params = ArrayHelper::merge($params,Yii::$app->request->queryParams);

        $itemModel = new ResItem();
        $searchModel = new ResItemSearch();
        $dataProvider = $searchModel->search($params);

        $type = ResType::find()->all();

        return $this->render('index', [
            'types' => $type,
            'model' => $itemModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'resTypeObject'=>$resTypeObject
        ]);
    }

    /**
     * Finds the ResItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ResItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ResItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Displays a single ResItem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
