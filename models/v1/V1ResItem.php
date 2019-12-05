<?php

namespace app\models\v1;

use app\models\ResVote;
use Yii;
use yii\behaviors\TimestampBehavior;

class V1ResItem extends \app\models\ResItem
{
    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'resType';
        $fields[] = 'statusType';
        $fields[] = 'submittedBy';

        unset($fields['res_type_id'],$fields['status_type_id'],$fields['submitted_by']);
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
    public function getResVotes()
    {
        return $this->hasMany(V1ResVote::className(), ['res_item_id' => 'id']);
    }
}
