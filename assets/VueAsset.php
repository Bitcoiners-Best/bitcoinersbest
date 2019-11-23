<?php
namespace app\assets;
use yii\web\AssetBundle;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class VueAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public function init()
    {
        parent::init();
        $this->js[] = YII_ENV === 'dev' ? 'app.js' : 'app.min.js';
    }
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}