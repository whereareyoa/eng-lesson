<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lesson;
/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'exercise_answer'], 'integer'],  // Фильтрация по ID и правильному ответу
            [['title', 'content', 'exercise_question'], 'safe'], // Фильтрация по строкам
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // Оставляем сценарии родительского класса без изменений
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lesson::find();  // Стартуем запрос для поиска уроков

        // Загружаем параметры поиска
        $dataProvider = new ActiveDataProvider([
            'query' => $query,  // Важно передать сюда запрос
        ]);

        // Загружаем данные из параметров поиска
        $this->load($params);

        // Если валидация не прошла, возвращаем пустой набор данных
        if (!$this->validate()) {
            return $dataProvider;
        }

        // Применяем фильтрацию по полям
        $query->andFilterWhere([
            'id' => $this->id,  // Фильтрация по ID
            'exercise_answer' => $this->exercise_answer,  // Фильтрация по правильному ответу
        ]);

        // Фильтрация по строкам с использованием 'like' для поиска по вхождению
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'exercise_question', $this->exercise_question]);

        // Если нужно фильтровать по содержимому exercise_options
        if ($this->exercise_options) {
            $query->andFilterWhere(['like', 'exercise_options', $this->exercise_options]);
        }

        return $dataProvider;  // Возвращаем объект с данными, который будет отображен в представлении
    }
}
