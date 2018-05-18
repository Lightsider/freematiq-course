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
    public $file=null;

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
            ['city', 'string', 'min' => 3, 'max' => 255],
            [['file'],'file','extensions' => "jpg,png,gif"]
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
        $user->setPassword($this->password_hash);
        $user->score = $this->score;
        $user->status = $this->status;
        if ($this->file) {
            $user->image = \Yii::$app->security->generateRandomString() . '.jpg';
        }
        elseif($this->image!=="") $user->image = $this->image;
        else $user->image = "/img/game/no_logo.png";

        $user->name = $this->name;
        $user->school = $this->school;
        $user->city = $this->city;


        $rbac = \Yii::$app->authManager;
        $role = $rbac->getRole($user->status);

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($user->save()) {
                if ($this->file) {
                    $this->file->saveAs(Yii::getAlias('@webroot') . "/img/game/uploads/{$user->image}");
                }
                $rbac->assign($role, $user->id);
                $transaction->commit();
                return $user;
            }
        }
        catch (\Throwable $e)
        {
            $transaction->rollBack();
            if(file_exists(Yii::getAlias('@webroot') . "/img/game/uploads/{$user->image}"))
            {
                unlink(Yii::getAlias('@webroot') . "/img/game/uploads/{$user->image}");
            }
            die($e->getMessage());
        }
        return null;
    }

    /**
     * update user
     *
     * @return User|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function updateUser($currentUser)
    {

        if($this->login!==$currentUser->login)
        if (!$this->validate()) {
            return null;
        }




        $user = User::findIdentity($currentUser->id);
        $user->login = $this->login;

        if($this->password_hash!=="")
        $user->setPassword($this->password_hash);
        else
        $user->password_hash = $currentUser->password_hash;
        $user->score = $this->score;

        $user->status = $this->status;
        if ($this->file) {
            $oldImage=$user->image;
            $user->image = \Yii::$app->security->generateRandomString() . '.jpg';
        }
        elseif($this->image!=="") $user->image = $this->image;
        else $user->image = $currentUser->image;

        $user->name = $this->name;
        $user->school = $this->school;
        $user->city = $this->city;

        $rbac = \Yii::$app->authManager;
        $role = $rbac->getRole($user->status);

        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($user->save()) {
                if ($this->file) {
                    if(file_exists($oldImage))
                    {
                        unlink($oldImage);
                    }
                    $this->file->saveAs(Yii::getAlias('@webroot') . "/img/game/uploads/{$user->image}");
                }

                $rbac->revokeAll( $user->id);
                $rbac->assign($role, $user->id);

                $transaction->commit();

                return $user;
            }
        }
        catch (\Throwable $e)
        {
            $transaction->rollBack();
            die($e->getMessage());
        }
        return null;
    }
}