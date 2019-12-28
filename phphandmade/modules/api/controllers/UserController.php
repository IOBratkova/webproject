<?php

namespace app\modules\api\controllers;

use app\models\LoginForm;
use app\models\User;
use Yii;

class UserController extends BaseController
{
    public $modelClass = "app\models\User";

    public function verbs()
    {
        return [
            'signup' => ['POST', 'OPTIONS'],
            'signin' => ['POST', 'OPTIONS']
        ];
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->save()) {
            return $model;
        }
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
