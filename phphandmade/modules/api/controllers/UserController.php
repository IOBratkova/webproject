<?php

namespace app\modules\api\controllers;

use app\models\User;
use Yii;

class UserController extends BaseController
{
    public $modelClass = "app\models\User";

    public function verbs()
    {
        return [
            'signup' => ['POST', 'OPTIONS']
        ];
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->save()) {
            return $model;
        }
    }
}
