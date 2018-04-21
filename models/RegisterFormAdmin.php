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
class RegisterFormAdmin extends Model
{
    public $login;
    public $password_hash;
    public $status;
    public $score;
    public $image;
    public $name;
    public $school;
    public $city;

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
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 5],
            ['status', 'string'],
            ['score', 'integer'],
            ['image', 'string', 'max' => 255],
            ['name', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 255],
            ['school', 'required'],
            ['school', 'string', 'min' => 3, 'max' => 255],
            ['city', 'required'],
            ['city', 'string', 'min' => 3, 'max' => 255]
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
        /*if (!$this->validate()) {

            return null;
        }*/

        $user = new User();

        $user->login = $this->login;
        $user->setPassword($this->password_hash);
        $user->score = $this->score;
        $user->status = $this->status;
        $user->image = $this->image;
        $user->name = $this->name;
        $user->school = $this->school;
        $user->city = $this->city;

        if ($user->save()) {

            $rbac = \Yii::$app->authManager;
            $role = $rbac->getRole($user->status);

            $rbac->assign($role, $user->id);

            return $user;
        }
        return null;
    }
}