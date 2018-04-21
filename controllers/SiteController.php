<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;

class SiteController extends Controller
{
    public $layout = 'main';
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $news=News::find()->all();

        return $this->render('index',[
            'news'=>$news
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        /*$model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }*/
        return $this->render('contact'/*, [
            'model' => $model,
        ]*/);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    /*public function actionAbout()
    {
        return $this->render('about');
    }*/

    /*
     * Displays gallery page
     *
     * @return Response|string
     */
    public function actionGallery()
    {
        return $this->render('gallery');
    }

    /*
     * Displays particip page
     *
     * @return Response|string
     */
    public function actionParticip()
    {
        $users = new User();

        $users=User::find()->where("status='user'")->all();
        return $this->render('particip',[
            'users'=>$users
        ]);
    }

    /*
    * Displays org page
    *
    * @return Response|string
    */
    public function actionOrg()
    {
        return $this->render('org');
    }


    //Begin games part

    /*public function actionLogin()
    {
        return $this->render('login');
    }*/
}
