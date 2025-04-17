<?php

namespace app\controllers;

use app\models\Lesson;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class LessonController extends Controller
{
    public function actionView($id)
    {
        $lesson = $this->findModel($id);
        $correct = null;
        $message = null;

        if (Yii::$app->request->isPost) {
            $userAnswer = Yii::$app->request->post('user_answer');
            Yii::info('User answer: ' . $userAnswer, 'lesson');
            Yii::info('Correct answer: ' . $lesson->exercise_answer, 'lesson');

            if ((int)$userAnswer === $lesson->exercise_answer) {
                $correct = true;
                $message = 'Правильный ответ! Отлично!';
            } else {
                $correct = false;
                $message = 'Неправильный ответ, попробуйте снова!';
            }
        }

        return $this->render('view', [
            'lesson' => $lesson,
            'correct' => $correct,
            'message' => $message,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Lesson::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndex()
    {
        $lessons = Lesson::find()->all();
        return $this->render('index', [
            'lessons' => $lessons,
        ]);
    }
}
?>
