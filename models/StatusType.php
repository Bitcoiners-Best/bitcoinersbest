<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_type".
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 *
 * @property ResItem[] $resItems
 * @property ResVote[] $resVotes
 */
class StatusType extends \yii\db\ActiveRecord
{
    const RESITEM_ACTIVE = 50;
    const RESITEM_HIDDEN = 55;

    const RESVOTE_COUNTED = 70;
    const RESVOTE_PENDING = 75;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'display_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'display_name' => 'Display Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResItems()
    {
        return $this->hasMany(ResItem::className(), ['status_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResVotes()
    {
        return $this->hasMany(ResVote::className(), ['status_type_id' => 'id']);
    }
}
