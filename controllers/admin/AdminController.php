<?php


namespace app\controllers\admin;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

    public function beforeAction($action)
    {
        if(!User::isAdmin())
        {
            return $this->redirect(['game/login']);
        }
        return parent::beforeAction($action);
    }
}