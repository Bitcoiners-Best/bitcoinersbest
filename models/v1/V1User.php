<?php

namespace app\models\v1;

use Yii;
use yii\behaviors\TimestampBehavior;

class V1User extends \app\models\User
{
    public function extraFields()
    {
        return [];
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['auth_key'],$fields['password_hash'],$fields['password_reset_token']);
        return $fields;
    }
}
