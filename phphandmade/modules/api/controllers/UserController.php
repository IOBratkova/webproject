<?php

namespace app\modules\api\controllers;

use app\components\ImageHelper;
use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\web\UploadedFile;

class UserController extends BaseActiveController
{
    public $modelClass = "app\models\User";

    public function verbs()
    {
        return [
            'index' => ['GET', 'HEAD', 'OPTIONS'],
            'view' => ['GET', 'HEAD', 'OPTIONS'],
            'create' => ['POST', 'OPTIONS'],
            'update' => ['PUT', 'PATCH', 'OPTIONS'],
            'delete' => ['DELETE', 'OPTIONS'],
            'signup' => ['POST', 'OPTIONS'],
            'signin' => ['POST', 'OPTIONS']
        ];
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->getBodyParams(), '')) {
            $files = UploadedFile::getInstancesByName('image');

            if($files === null){
                return "огорчение";
            }

            $filename = ImageHelper::create($files[0]);

            $model->avatar = $filename;

            if(!$model->save()){
                return 'Ошибка сохранения модели';
            }

            $files[0]->saveAs($filename);
            return $model;
        }
        return 'беда';
    }

    public function actionSignin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->getBodyParams(), '');

        if($model->login()){
            return $model->getUser();
        }

        return $model;
    }
}
