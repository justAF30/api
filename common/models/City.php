<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $region_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_cyrl
 * @property int $phone_kod
 * @property int $c_order
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'name_uz', 'name_ru', 'name_en', 'name_cyrl', 'phone_kod', 'c_order'], 'required'],
            [['region_id', 'phone_kod', 'c_order'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'name_cyrl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_cyrl' => 'Name Cyrl',
            'phone_kod' => 'Phone Kod',
            'c_order' => 'C Order',
        ];
    }
}
