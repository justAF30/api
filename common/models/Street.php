<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "street".
 *
 * @property int $id
 * @property int|null $city_id
 * @property string $name_uz
 * @property string $name_cyrl
 * @property string $name_ru
 * @property string $name_en
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'street';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['name_uz', 'name_cyrl', 'name_ru', 'name_en'], 'required'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
            [['name_cyrl'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'name_uz' => 'Name Uz',
            'name_cyrl' => 'Name Cyrl',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
        ];
    }
}
