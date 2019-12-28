<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photolessons".
 *
 * @property int $id
 * @property string $title Название урока
 * @property string $description Описание
 * @property string $materials Материалы
 * @property int $countImages Количество изображений
 * @property string $createAt Дата создания
 * @property string|null $updateAt Дата изменения
 * @property int $userID ID пользователя
 * @property int $handmadeTypeID ID вида рукоделия
 *
 * @property Image[] $images
 * @property HandmadeType $handmadeType
 * @property User $users
 */
class Photolesson extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photolessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'materials', 'userID', 'handmadeTypeID'], 'required'],
            [['materials'], 'string'],
            [['countImages', 'userID', 'handmadeTypeID'], 'integer'],
            [['createAt', 'updateAt'], 'safe'],
            [['title', 'description'], 'string', 'max' => 128],
            [['handmadeTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => HandmadeType::className(), 'targetAttribute' => ['handmadeTypeID' => 'id']],
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
            'countImages' => 'Количество изображений',
            'createAt' => 'Дата создания',
            'updateAt' => 'Дата изменения',
            'userID' => 'ID пользователя',
            'handmadeTypeID' => 'ID вида рукоделия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['lessonID' => 'id']);
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
