<?php


namespace app\modules\api\controllers;


use app\models\Image;
use app\components\ImageHelper;
use Yii;
use yii\web\UploadedFile;

class ImageController extends BaseController
{
    public $modelClass = "app\models\Image";

    public function verbs()
    {
        return [
            'create' => ['POST', 'OPTIONS'],
        ];
    }

    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->getBodyParams(), '')) {
            $files = UploadedFile::getInstancesByName('image');

            if($files === null){
                return "огорчение";
            }

            $filename = ImageHelper::create($files[0]);

            $model->path = $filename;

            if(!$model->save()){
                return;
            }

            $files[0]->saveAs($filename);
            return $model;
        }
        return 'беда';
    }
}
