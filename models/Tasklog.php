<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasklog".
 *
 * @property int $id Первичный ключ
 * @property int $id_user
 * @property int $id_task
 * @property string $time
 * @property string $flag
 * @property string $result
 *
 * @property Tasks $task
 * @property User $user
 */
class Tasklog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasklog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_task'], 'integer'],
            [['time'], 'safe'],
            [['result'], 'string'],
            [['flag'], 'string', 'max' => 255],
            [['id_task'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['id_task' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_task' => 'Id Task',
            'time' => 'Time',
            'flag' => 'Flag',
            'result' => 'Result',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'id_task']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @inheritdoc
     * @return TasklogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasklogQuery(get_called_class());
    }
}
