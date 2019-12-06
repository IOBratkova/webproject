<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videolessons".
 *
 * @property int $id
 * @property string $title Название урока
 * @property string $description Описание
 * @property string $materials Материалы
 * @property string $createAt Дата создания
 * @property string|null $updateAt Дата изменения
 * @property string $link Ссылка на видео
 * @property int $userID ID пользователя
 * @property int $handmadeTypeID ID вида рукоделия
 *
 * @property Handmadetype $handmadeType
 * @property User $users
 */
class Videolesson extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videolessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'materials', 'createAt', 'link', 'userID', 'handmadeTypeID'], 'required'],
            [['materials'], 'string'],
            [['createAt', 'updateAt'], 'safe'],
            [['userID', 'handmadeTypeID'], 'integer'],
            [['title', 'description'], 'string', 'max' => 128],
            [['link'], 'string', 'max' => 255],
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
            'title' => 'Название урока',
            'description' => 'Описание',
            'materials' => 'Материалы',
            'createAt' => 'Дата создания',
            'updateAt' => 'Дата изменения',
            'link' => 'Ссылка на видео',
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
