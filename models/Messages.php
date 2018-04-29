<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id Первичный ключ
 * @property string $time
 * @property string $title
 * @property string $description
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'title'], 'required'],
            [['time'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @inheritdoc
     * @return MessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessagesQuery(get_called_class());
    }
}
