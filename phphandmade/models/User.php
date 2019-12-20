<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $lastName Фамилия
 * @property string $login Логин
 * @property string $email Email
 * @property string $password Пароль
 * @property string $authKey Ключ авторизации
 * @property string $createAt Дата создания
 * @property string $accessToken Токен
 * @property string|null $updateAt Дата изменения
 * @property string $role Роль пользователя
 *
 * @property Photolesson[] $photolessons
 * @property Scheme[] $schemes
 * @property Videolesson[] $videolessons
 */
class User extends BaseModel implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lastName', 'login', 'email', 'password', 'authKey', 'createAt', 'accessToken', 'role'], 'required'],
            [['createAt', 'updateAt'], 'safe'],
            [['name', 'lastName', 'login', 'email', 'password', 'authKey', 'role'], 'string', 'max' => 128],
            [['accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'lastName' => 'Фамилия',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'authKey' => 'Ключ авторизации',
            'createAt' => 'Дата создания',
            'accessToken' => 'Токен',
            'updateAt' => 'Дата изменения',
            'role' => 'Роль пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotolessons()
    {
        return $this->hasMany(Photolesson::className(), ['userID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::className(), ['userID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideolessons()
    {
        return $this->hasMany(Videolesson::className(), ['userID' => 'id']);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
    }

    public function beforeSave($insert)
    {
        if(!parent::beforeSave($insert))
            return false;

        if($insert) {
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            $this->accessToken = Yii::$app->security->generateRandomString();
            $this->authKey = Yii::$app->security->generateRandomString();
        }

        return true;
    }
}
