<?php


namespace app\modules\api\controllers;
use app\models\Photolesson;
use Yii;

class PhotolessonController extends BaseActiveController
{
    public $modelClass = "app\models\Photolesson";

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD', 'OPTIONS'],
            'view' => ['GET', 'HEAD', 'OPTIONS'],
            'create' => ['POST', 'OPTIONS'],
            'update' => ['PUT', 'PATCH', 'OPTIONS'],
            'delete' => ['DELETE', 'OPTIONS'],
            'getlast' => ['GET', 'OPTIONS']
        ];
    }

    public function actionGetlast()
    {
        $params = Yii::$app->request->getQueryParams();

        $model = Photolesson::find()->orderBy(['id'=>SORT_DESC]);

        if(array_key_exists('offset', $params))
        {
            $model = $model->offset($params['offset']);
        }

        if(array_key_exists('count', $params))
        {
            $model = $model->limit($params['count']);
        }

        return $model->all();
    }
}
