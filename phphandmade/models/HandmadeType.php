<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "handmadetypes".
 *
 * @property int $id
 * @property string $title Заголовок
 *
 * @property Photolesson[] $photolessons
 * @property Scheme[] $schemes
 * @property Videolesson[] $videolessons
 */
class HandmadeType extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'handmadetypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotolessons()
    {
        return $this->hasMany(Photolesson::className(), ['handmadeTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::className(), ['handmadeTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideolessons()
    {
        return $this->hasMany(Videolesson::className(), ['handmadeTypeID' => 'id']);
    }
}
