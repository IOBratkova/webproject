<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schemes".
 *
 * @property int $id
 * @property string $title Название cхемы
 * @property string $description Описание
 * @property string $path Путь к изображению схемы
 * @property string $createAt Дата создания
 * @property string|null $updateAt Дата изменения
 * @property int $userID ID пользователя
 * @property int $handmadeTypeID ID вида рукоделия
 *
 * @property Handmadetype $handmadeType
 * @property User $users
 */
class Scheme extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schemes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'path', 'createAt', 'userID', 'handmadeTypeID'], 'required'],
            [['createAt', 'updateAt'], 'safe'],
            [['userID', 'handmadeTypeID'], 'integer'],
            [['title', 'description', 'path'], 'string', 'max' => 128],
            [['handmadeTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Handmadetype::className(), 'targetAttribute' => ['handmadeTypeID' => 'id']],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название cхемы',
            'description' => 'Описание',
            'path' => 'Путь к изображению схемы',
            'createAt' => 'Дата создания',
            'updateAt' => 'Дата изменения',
            'userID' => 'ID пользователя',
            'handmadeTypeID' => 'ID вида рукоделия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHandmadeType()
    {
        return $this->hasOne(Handmadetype::className(), ['id' => 'handmadeTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userID']);
    }
}
