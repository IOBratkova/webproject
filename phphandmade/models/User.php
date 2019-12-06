<?php

namespace app\models;

use Yii;

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
class User extends BaseModel
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
}
