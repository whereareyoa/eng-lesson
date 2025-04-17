<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Word extends ActiveRecord
{
    public static function tableName()
    {
        return 'word'; // Убедись, что название таблицы правильное
    }

    public function rules()
    {
        return [
            [['word', 'translation'], 'required'], // Поля обязательные для заполнения
            [['word', 'translation'], 'string', 'max' => 255], // Максимальная длина строк
            [['is_remembered'], 'boolean'], // Проверка на булевое значение для флага
            [['last_reviewed_at'], 'safe'], // Поле с датой (без валидации формата, так как это поле можно оставить пустым)
        ];
    }

    /**
     * Этот метод выполняется перед сохранением модели.
     * Мы можем использовать его для установки значений по умолчанию.
     */
    public function beforeSave($insert)
    {
        // Если это новая запись, устанавливаем значение для created_at и last_reviewed_at
        if ($this->isNewRecord) {
            // Устанавливаем текущую дату для last_reviewed_at, если она не была указана
            if (empty($this->last_reviewed_at)) {
                $this->last_reviewed_at = date('Y-m-d H:i:s'); // Устанавливаем текущую дату
            }

            // Устанавливаем дату для created_at (если не указано вручную)
            if ($this->isNewRecord && empty($this->created_at)) {
                $this->created_at = date('Y-m-d H:i:s'); // Устанавливаем текущую дату
            }
        }

        return parent::beforeSave($insert); // Вызываем родительский метод перед сохранением
    }

    /**
     * Этот метод используется для создания записи в базе данных с добавлением времени по умолчанию
     */
    public static function createNewWord($word, $translation)
    {
        $model = new Word();
        $model->word = $word;
        $model->translation = $translation;
        $model->is_remembered = 0; // Новый элемент не запомнен
        $model->save();
    }
}
