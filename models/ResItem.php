<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "res_item".
 *
 * @property int $id
 * @property int $res_type_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $rss
 * @property string $url
 * @property int $vote_count
 * @property int $status_type_id
 * @property string $data
 * @property string $created_at
 * @property string $created_by
 * @property int $submitted_by
 *
 * @property ResType $resType
 * @property StatusType $statusType
 * @property User $submittedBy
 * @property ResVote[] $resVotes
 */
class ResItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'res_item';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
                'updatedAtAttribute'=>false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['res_type_id','title','description','url'],'required'],
            [['status_type_id'],'default','value'=>StatusType::RESITEM_ACTIVE],
            [['submitted_by'],'default','value'=>Yii::$app->user->id],
            [['res_type_id', 'vote_count', 'status_type_id', 'submitted_by'], 'integer'],
            [['data'], 'string'],
            [['rss','url'],'url'],
            [['title', 'description', 'image', 'rss', 'url', 'created_at', 'created_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'res_type_id' => 'Res Type ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'rss' => 'Rss',
            'url' => 'Url',
            'vote_count' => 'Vote Count',
            'status_type_id' => 'Status Type ID',
            'data' => 'Data',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'submitted_by' => 'Submitted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResType()
    {
        return $this->hasOne(ResType::className(), ['id' => 'res_type_id']);
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
    public function getSubmittedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'submitted_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResVotes()
    {
        return $this->hasMany(ResVote::className(), ['res_item_id' => 'id']);
    }
}
