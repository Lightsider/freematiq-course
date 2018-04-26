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
    public $status = 'user';
    public $score = 0;
    public $image = 'img/game/no_logo.png';
    public $name;
    public $school;
    public $city;
    public $file = null;

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
            ['city', 'required'],
            ['city', 'string', 'min' => 3, 'max' => 255]
        ];
    }

    /**
     * Registers user
     *
     * @return UserReg|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function register()
    {
        if (!$this->validate()) {

            return null;
        }


        $user = new UserReg();

        $user->login = $this->login;
        $user->setPassword($this->password);
        $user->score = 0;
        $user->status = 'user';
        if ($this->file) {
            $user->image = \Yii::$app->security->generateRandomString() . '.jpg';
        } else $user->image = "/img/game/no_logo.png";
        $user->name = $this->name;
        $user->school = $this->school;
        $user->city = $this->city;


        $rbac = \Yii::$app->authManager;
        $userRole = $rbac->getRole('user');

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($user->save()) {
                if ($this->file) {
                    $this->file->saveAs(Yii::getAlias('@webroot') . "/img/game/uploads/{$user->image}");
                }

                $rbac->assign($userRole, $user->id);
                $transaction->commit();
                return $user;
            }
        } catch (\Throwable $e) {
            $transaction->rollBack();
        }
        return null;
    }
}