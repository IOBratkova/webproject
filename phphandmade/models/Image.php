<?php

namespace app\models;

use app\components\ImageHelper;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

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
class Image extends ActiveRecord
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
            [['lessonID'], 'required'],
            [['lessonID'], 'integer'],
            [['description', 'path'], 'string', 'max' => 128],
            [['lessonID'], 'exist', 'skipOnError' => true, 'targetClass' => Photolesson::className(), 'targetAttribute' => ['lessonID' => 'id']],
            [['image'], 'string']
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
            'image' => 'Изображение'
        ];
    }
/*
    public function beforeSave($insert)
    {
        parent::beforeSave($insert); // TODO: Change the autogenerated stub

        $this->uploadImage('path');
    }
*/
    public function uploadImage($attribute)
    {
        $file = UploadedFile::getInstance($this, $attribute);

        if($file === null){
            return;
        }

        $filename = ImageHelper::create($file);

        $model = new Image();
        $model->id = $this->id;
        $model->path = $filename;
        $model->description = $this->description;
        $model->save();

        $file->saveAs($filename);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Photolesson::className(), ['id' => 'lessonID']);
    }
}
