<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 15.04.2018
 * Time: 11:55
 */

namespace app\controllers;


use app\models\Category;
use app\models\Tasklog;
use app\models\Tasks;
use Faker\Provider\DateTime;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['solve'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'solve' => ['post'],
                ],
            ],
        ];
    }

    public function actionSolve()
    {
        $model = new \app\models\OneTask();
        $model->load(\Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()))
        {
            $res=$model->checkSolve();
            if($res===1)
            {
                $message="Вы правильно решили задание";
                $user = \app\models\User::findIdentity(Yii::$app->user->id);
                $user->score+=Tasks::findOne(['id'=>$model->task_id])->score;
                $user->save();
            }
            elseif($res===0)
            {
                $message="Неверный формат флага";
            }
            elseif($res===-1)
            {
                $message="Неверный флаг";
            }
            else return $this->redirect("/game/tasks#task".$model->task_id);

            Yii::$app->session->setFlash('id_task',$model->task_id);
            Yii::$app->session->setFlash('message',$message);

            return $this->redirect("/game/tasks#task".$model->task_id);
        }

    }
}