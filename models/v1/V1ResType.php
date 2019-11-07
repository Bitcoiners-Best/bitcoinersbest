<?php

namespace app\models\v1;

use app\models\ResType;
use Yii;

/**
 * This is the model class for table "res_type".
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 *
 * @property ResItem[] $resItems
 */
class V1ResType extends ResType
{

}
