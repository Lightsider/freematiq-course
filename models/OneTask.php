<?php

namespace app\models;
use app\models\Category;
use Yii;
use yii\base\Model;

class OneTask extends Model
{
    public $flag = null;
    public $task_id = null;

    public function __construct(Tasks $tasks = null) {
        if (null !== $tasks) {
            $this->task_id = $tasks->id;
        }
    }
    public function rules()
    {
        return [
            ['flag', 'string', 'max' => 255],
            ['flag','match','pattern' => '/^School\{[a-z0-9]{0,248}\}$/'],
            ['flag','required'],
            ['task_id','required'],
            ['task_id','integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flag' => '',
            'task_id'=>''
        ];
    }

    public function checkSolve()
    {
        $task = Tasks::findOne(['id' => $this->task_id]);
        if(Tasklog::find()->filterWhere(['id_task'=>$task->id,'result'=>'true',
                'id_user'=>Yii::$app->user->getId()])->count()==="0") {

            $tasklog = new Tasklog();
            $tasklog->id_user = Yii::$app->user->getId();
            $tasklog->id_task = $task->id;
            $tasklog->time = date('Y-m-d H:i:s');
            $tasklog->flag = $this->flag;

            if ($this->validate()) {
                if ($task->flag === $this->flag) {
                    $tasklog->result = "true";
                    $message = "Вы верно решили задание";
                    $tasklog->save();
                    return 1;
                } else {
                    $tasklog->result = "false";
                    $message = "Неверный флаг";
                    $tasklog->save();
                    return -1;
                }


            } else {
                $tasklog->result = "false";
                $tasklog->save(false);
                return 0;
            }
        }
        return false;
    }
}