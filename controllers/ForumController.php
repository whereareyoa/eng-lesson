<?php

namespace app\controllers;

use Yii;
use app\models\ForumTopic;
use app\models\ForumPost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ForumController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create-topic', 'create-post'],
                        'allow' => true,
                        'roles' => ['@'], // Авторизованные пользователи
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ForumTopic::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {

        $topic = $this->findTopic($id);
        $post = new ForumPost(); // Модель для создания нового сообщения
        $post->topic_id = $topic->id;

        return $this->render('view', [
            'topic' => $topic,
            'post' => $post,
        ]);
    }

    public function actionCreateTopic()
    {
        $topic = new ForumTopic();
        $topic->created_by = Yii::$app->user->id; // ID текущего пользователя

        if ($topic->load(Yii::$app->request->post()) && $topic->save()) {
            return $this->redirect(['view', 'id' => $topic->id]);
        }

        return $this->render('create_topic', [
            'topic' => $topic,
        ]);
    }

    public function actionCreatePost()
    {
        $post = new ForumPost();
        $post->created_by = Yii::$app->user->id;

        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            return $this->redirect(['view', 'id' => $post->topic_id]);
        }

        // Если не удалось сохранить (например, валидация), возвращаемся на страницу просмотра темы
        return $this->redirect(['view', 'id' => $post->topic_id]);
    }

    protected function findTopic($id)
    {
        if (($topic = ForumTopic::findOne($id)) !== null) {
            return $topic;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
