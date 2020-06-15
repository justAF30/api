<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\Cors;
use common\models\Country;
use common\models\search\CountrySearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends ActiveController
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
    public $modelClass = Country::class;
}
