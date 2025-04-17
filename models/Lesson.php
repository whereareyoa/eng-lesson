<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $exercise_question
 * @property string $exercise_options
 * @property int $exercise_answer
 * @property int $correct_answer
 */
class Lesson extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons'; // Убедитесь, что имя таблицы соответствует
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'exercise_question', 'exercise_options', 'correct_answer'], 'required'],
            [['content', 'exercise_question'], 'string'],
            [['exercise_answer', 'correct_answer'], 'integer'],
            [['title'], 'string', 'max' => 256],
            [['exercise_options'], 'string'], // exercise_options как строка для хранения JSON
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',  // Название урока
            'content' => 'Контент', // Текст урока
            'exercise_question' => 'Вопрос', // Вопрос для теста
            'exercise_answer' => 'Правильный ответ (по индексу)', // Правильный ответ (индекс)
            'exercise_options' => 'Варианты ответов', // Варианты для теста
            'correct_answer' => 'Индекс правильного ответа', // Индекс правильного варианта
        ];
    }

    /**
     * Возвращает варианты ответов в виде массива.
     *
     * @return array
     */
    public function getExerciseOptionsArray()
    {
        // Декодируем JSON строку в массив
        return json_decode($this->exercise_options, true);
    }

    /**
     * Проверяет, является ли ответ пользователя правильным.
     *
     * @param int $userAnswer Индекс ответа пользователя
     * @return bool
     */
    public function checkAnswer($userAnswer)
    {
        // Сравниваем индекс ответа пользователя с правильным индексом
        return (int)$userAnswer === $this->correct_answer;
    }

}
