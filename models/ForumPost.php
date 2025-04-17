<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class ForumPost extends ActiveRecord
{
    public static function tableName()
    {
        return 'forum_posts';
    }

    public function rules()
    {
        return [
            [['topic_id', 'content', 'created_by'], 'required'],
            [['topic_id', 'created_by'], 'integer'],
            [['content'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_id' => 'ID Темы',
            'content' => 'Сообщение',
            'created_by' => 'Автор',
            'created_at' => 'Дата создания',
        ];
    }

    public function getTopic()
    {
        return $this->hasOne(ForumTopic::class, ['id' => 'topic_id']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
