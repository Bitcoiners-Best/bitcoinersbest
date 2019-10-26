<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property string $tx_id
 * @property string $payment_request
 * @property string $memo
 * @property int $settled
 * @property int $submitted_by
 *
 * @property ResVote[] $resVotes
 * @property User $submittedBy
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['settled', 'submitted_by'], 'integer'],
            [['tx_id', 'payment_request', 'memo'], 'string', 'max' => 255],
            [['submitted_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['submitted_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tx_id' => 'Tx ID',
            'payment_request' => 'Payment Request',
            'memo' => 'Memo',
            'settled' => 'Settled',
            'submitted_by' => 'Submitted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResVotes()
    {
        return $this->hasMany(ResVote::className(), ['transaction_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmittedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'submitted_by']);
    }
}
