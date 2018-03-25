<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $login;
    public $password;
    //public $image;
    public $name;
    public $school;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже занят'],
            ['login', 'string', 'min' => 3, 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 5],
            ['name', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 255],
            ['school', 'required'],
            ['school', 'string', 'min' => 3, 'max' => 255],

        ];
    }

    /**
     * Registers user
     *
     * @return User|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->login = $this->login;
        $user->setPassword($this->password);
        $user->score=0;
        $user->status='user';
        $user->image="/img/game/no_logo.png";
        $user->name = $this->name;
        $user->school = $this->school;


        return $user->save() ? $user : null;
    }
}