<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class ForumTopic extends ActiveRecord
{
    public static function tableName()
    {
        return 'forum_topics';
    }

    public function rules()
    {
        return [
            [['title', 'created_by'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['created_by'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название темы',
            'created_by' => 'Автор',
            'created_at' => 'Дата создания',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(ForumPost::class, ['topic_id' => 'id']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
