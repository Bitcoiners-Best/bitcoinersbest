<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $twitter_id
 * @property int $submitted_by
 *
 * @property User $submittedBy
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['submitted_by'], 'integer'],
            [['name', 'url', 'twitter_id'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'url' => 'Url',
            'twitter_id' => 'Twitter ID',
            'submitted_by' => 'Submitted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmittedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'submitted_by']);
    }
}
