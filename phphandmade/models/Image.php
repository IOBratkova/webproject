<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string|null $description Краткое описанние
 * @property int $lessonID ID урока
 * @property string $path Путь к изображению
 *
 * @property Photolesson $lesson
 */
class Image extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lessonID', 'path'], 'required'],
            [['lessonID'], 'integer'],
            [['description', 'path'], 'string', 'max' => 128],
            [['lessonID'], 'exist', 'skipOnError' => true, 'targetClass' => Photolesson::className(), 'targetAttribute' => ['lessonID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Краткое описанние',
            'lessonID' => 'ID урока',
            'path' => 'Путь к изображению',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Photolesson::className(), ['id' => 'lessonID']);
    }
}
