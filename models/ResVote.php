<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\BadRequestHttpException;

/**
 * This is the model class for table "res_vote".
 *
 * @property int $id
 * @property int $res_item_id
 * @property int $count
 * @property int $status_type_id
 * @property int $transaction_id
 *
 * @property ResItem $resItem
 * @property StatusType $statusType
 * @property Transactions $transaction
 */
class ResVote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'res_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
                'updatedAtAttribute'=>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['res_item_id','count'],'required'],
            [['res_item_id', 'count', 'status_type_id', 'transaction_id','user_id'], 'integer'],
            [['status_type_id'],'default','value'=>StatusType::RESVOTE_COUNTED],
            [['user_id'],'default','value'=>Yii::$app->user->id],
            [['user_id'],'voteValidate1x'],
            ['transaction_id', 'required', 'when' => function($model) {
                return $model->count > 1;
            }]
        ];
    }

    public function voteValidate1x($attribute,$params)
    {
        if ($this->count == 1) {
            if (Yii::$app->user->identity->canVote1x($this->res_item_id)) {
                return true;
            }
            $this->addError('user_id','User cannot vote this resource again!');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'res_item_id' => 'Res Item ID',
            'count' => 'Count',
            'status_type_id' => 'Status Type ID',
            'transaction_id' => 'Transaction ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResItem()
    {
        return $this->hasOne(ResItem::className(), ['id' => 'res_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusType()
    {
        return $this->hasOne(StatusType::className(), ['id' => 'status_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasOne(Transactions::className(), ['id' => 'transaction_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->resItem->vote_count += $this->count;
        $this->resItem->save();
    }
}
