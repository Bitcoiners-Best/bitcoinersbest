<?php

namespace app\models;

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
class ResType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'res_type';
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
        return $this->hasMany(ResItem::className(), ['res_type_id' => 'id']);
    }

    public static function getAvailableTypesAsArray()
    {
        return \yii\helpers\ArrayHelper::map(static::find()->asArray()->all(),'id','display_name');
    }
}
