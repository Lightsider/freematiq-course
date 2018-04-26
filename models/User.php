<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id Первичный ключ
 * @property string $login
 * @property string $password_hash
 * @property string $status
 * @property int $score
 * @property string $image
 * @property string $name
 * @property string $school
 * @property string $city
 * @property string $password write-only password
 *
 * @property Tasklog[] $tasklogs
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password_hash', 'name', 'school'], 'required'],
            [['status'], 'string'],
            [['score'], 'integer'],
            [['login', 'image', 'name', 'school'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password_hash' => 'Password',
            'status' => 'Status',
            'score' => 'Score',
            'image' => 'Image',
            'name' => 'Name',
            'school' => 'School',
            'city' => 'City'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasklogs()
    {
        return $this->hasMany(Tasklog::className(), ['id_user' => 'id']);
    }

    public function getCompleteTasklogs()
    {
        return $this->hasMany(Tasklog::className(), ['id_user' => 'id','result'=>'true']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by login
     *
     * @param string login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     *
     */
    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }


    public function getStatus()
    {
        return $this->status;
    }

    public static function isAdmin()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $user=User::findIdentity( Yii::$app->user->getId());

        if($user->getStatus()==="admin") return true;
        else return false;
    }

    public function getUploadPath()
    {
        return empty($this->image) ? null : '/img/game/uploads/' . $this->image;
    }
}
