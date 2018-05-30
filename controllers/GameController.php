<?php

namespace app\controllers;

use app\models\Category;
use app\models\Messages;
use app\models\OneTask;
use app\models\Tasklog;
use app\models\Tasks;
use app\models\User;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;

class GameController extends Controller
{
    public $layout = 'game';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays login.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(["game/tasks"]);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
            Yii::$app->user->logout();
            return $this->redirect(["game/login"]);
    }

    /**
     * Displays tasks.
     *
     * @return string
     */
    public function actionTasks()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(["game/login"]);
        }
        $user = \app\models\User::findIdentity(Yii::$app->user->id);
        $user_id=$user->id;

        $categories = Category::find()->all();
        $tasks = Tasks::find()->orderBy(['score'=>SORT_ASC])->all();
        $completeTasks = Tasklog::find()->filterWhere(['id_user'=>$user_id,'result'=>'true'])->asArray()->all();
        foreach ($tasks as $task)
        {
            $completeAllTeamsTasks[$task->id]=Tasklog::find()->filterWhere(['id_task'=>$task->id,'result'=>'true'])->count();
        }

        if(count($completeTasks)!=0)
        foreach ($completeTasks as $completeTask)
        {
            $completeTaskArr[] = $completeTask['id_task'];
        }
        else $completeTaskArr=array();


        $messages=Messages::find()->orderBy(['time'=>SORT_DESC])->all();

        return $this->render('tasks',[
            'categories'=>$categories,
            'tasks'=>$tasks,
            'completeTasks'=>$completeTaskArr,
            'completeAllTeamsTasks'=>$completeAllTeamsTasks,
            'messages'=>$messages
        ]);
    }

    /**
     * Displays result.
     *
     * @return string
     */
    public function actionResult()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(["game/login"]);
        }

        $users = new User();

        $users=User::find()->where("status='user'")->orderBy(['score'=>SORT_DESC])->all();
        return $this->render('result',[
            'users'=>$users
        ]);
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(["game/tasks"]);
        } else
            return $this->redirect(["game/login"]);
    }

    /*
     * Displays registration
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(["game/tasks"]);
        }

        $model = new \app\models\RegisterForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            try {
                if ($user = $model->register()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->redirect(["game/tasks"]);
                    }
                }
            } catch (Exception $e) {
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }
}
