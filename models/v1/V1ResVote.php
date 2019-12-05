<?php

namespace app\models\v1;

use Yii;
use yii\behaviors\TimestampBehavior;

class V1ResVote extends \app\models\ResVote
{
    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'statusType';
        $fields[] = 'resItem';

        unset($fields['res_item_id'],$fields['res_type_id'],$fields['status_type_id'],$fields['user_id']);
        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmittedBy()
    {
        return $this->hasOne(V1User::className(), ['id' => 'submitted_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResItem()
    {
        return $this->hasOne(V1ResItem::className(), ['id' => 'res_item_id']);
    }
}
