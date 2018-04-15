<?php


namespace app\controllers\admin;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public $layout = 'default';

    public function checkUser()
    {
        if(User::isAdmin())
        {
            return true;
        }
        else return false;
    }

//    public function beforeAction($action)
//    {
//        if(!User::isAdmin())
//        {
//            return $this->redirect(['game/login']);
//        }
//        return parent::beforeAction($action);
//    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete','index','view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}