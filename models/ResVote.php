<?php

namespace app\models;

use Yii;

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
    public function rules()
    {
        return [
            [['res_item_id', 'count', 'status_type_id', 'transaction_id'], 'integer'],
            [['res_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResItem::className(), 'targetAttribute' => ['res_item_id' => 'id']],
            [['status_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusType::className(), 'targetAttribute' => ['status_type_id' => 'id']],
            [['transaction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transactions::className(), 'targetAttribute' => ['transaction_id' => 'id']],
        ];
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
}
