<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id Первичный ключ
 * @property int $id_category
 * @property string $flag
 * @property int $score
 * @property string $title
 * @property string $description
 *
 * @property Tasklog[] $tasklogs
 * @property Category $category
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'score'], 'integer'],
            [['flag'], 'required'],
            [['description'], 'string'],
            [['flag', 'title'], 'string', 'max' => 255],
            [['flag'], 'unique'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'flag' => 'Flag',
            'score' => 'Score',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasklogs()
    {
        return $this->hasMany(Tasklog::className(), ['id_task' => 'id']);
    }

    public function getCompleteTasklogs()
    {
        return $this->hasMany(Tasklog::className(), ['id_task' => 'id','result'=>'true']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * @inheritdoc
     * @return TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }
}
