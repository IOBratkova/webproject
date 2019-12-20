<?php

namespace app\modules\api\controllers;

class UserController extends BaseActiveController
{
    public $modelClass = "app\models\User";

    /*public function verbs()
    {
        return [
            'signUp' => ['POST', 'OPTIONS']
        ];
    }

    public function actionSignUp()
    {
        return ['status' => 'success'];
    }*/
}