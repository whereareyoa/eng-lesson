<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Word;

class WordController extends Controller
{
    public function actionIndex()
    {
        // Получаем все слова, отсортированные по дате создания
        $words = Word::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('index', ['words' => $words]);
    }

    public function actionAdd()
    {
        $model = new Word();

        // Если форма отправлена и модель проходит валидацию, сохраняем данные
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Слово успешно добавлено!');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при сохранении слова.');
            }
        }

        return $this->render('add', ['model' => $model]);
    }

    public function actionRemember($id)
    {
        // Находим слово по ID
        $word = Word::findOne($id);
        if ($word) {
            // Обновляем флаг запомненного слова
            $word->is_remembered = 1;
            if ($word->save(false)) {
                Yii::$app->session->setFlash('success', 'Слово отмечено как запомненное');
            } else {
                Yii::$app->session->setFlash('error', 'Не удалось сохранить изменения');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Слово не найдено');
        }
        return $this->redirect(['index']);
    }

    public function actionRandom()
    {
        // Получаем случайное слово
        $word = Word::find()->orderBy(new \yii\db\Expression('RAND()'))->one();
        if ($word) {
            return $this->render('random', ['word' => $word]);
        } else {
            Yii::$app->session->setFlash('error', 'Нет доступных слов');
            return $this->redirect(['index']);
        }
    }

    public function actionRepeat()
    {
        // Получаем слова, которые нужно повторить (срок последнего повторения больше 3 дней)
        $words = Word::find()
            ->where(['<', 'last_reviewed_at', new \yii\db\Expression('NOW() - INTERVAL 3 DAY')])
            ->andWhere(['is_remembered' => 0])
            ->all();

        return $this->render('repeat', ['words' => $words]);
    }
}
