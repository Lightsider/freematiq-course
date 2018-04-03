<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

        $category = Category::find()->asArray()->all();

        return $this->render('tasks',compact('category'));
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
        return $this->render('result');
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
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(["game/tasks"]);
                }
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }
}
