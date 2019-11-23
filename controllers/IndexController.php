<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * ResItemController implements the CRUD actions for ResItem model.
 */
class IndexController extends Controller
{
    // IndexController.php
    public function actionVue()
    {
        // set the specific layout for pages that will render vue
        $this->layout = 'vue_main';

        // override bundle configuration if needed
        Yii::$app->assetManager->bundles = [];

        // render page
        return $this->render('vue_page');
    }
}
?>