<?php

namespace app\components;

use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ImageHelper
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public static function create($file)
    {
        $basePath = 'uploads/img/';
        $date = date('Y/m/d');
        FileHelper::createDirectory($basePath . $date);

        return $basePath . $date . '/'.md5($file->name . time()) . '.' . $file->extension;
    }
}
