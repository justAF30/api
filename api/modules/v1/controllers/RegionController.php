<?php

namespace api\modules\v1\controllers;

use common\models\City;
use common\models\Street;
use Yii;
use common\models\Region;
use common\models\search\RegionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegionController implements the CRUD actions for Region model.
 */
class RegionController extends Controller
{
    public static function allowedDomains()
    {
        return [
            // '*',                        // star allows all domains
            'http://test1.example.com',
            'http://localhost:3000',
        ];
    }
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST', "GET"],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    /**
     * Lists all Region models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $region_id = $id;

        $cities = City::find()->where(['region_id' => $region_id])->all();

        return ['status' => true, 'cities' => $cities];
    }

}
