<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_cyrl
 * @property string $hc_key
 * @property int $c_order
 * @property string|null $address
 * @property string|null $phone
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'name_cyrl', 'hc_key', 'c_order'], 'required'],
            [['c_order'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'name_cyrl'], 'string', 'max' => 100],
            [['hc_key'], 'string', 'max' => 10],
            [['address', 'phone'], 'string', 'max' => 250],
            [['name_uz'], 'unique'],
            [['name_ru'], 'unique'],
            [['name_en'], 'unique'],
            [['hc_key'], 'unique'],
            [['name_cyrl'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_cyrl' => 'Name Cyrl',
            'hc_key' => 'Hc Key',
            'c_order' => 'C Order',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }


    public static function CyrillToLatin($textCyrill)
    {
        $array = array(
            "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "yo", "ж" => "j", "з" => "z", "и" => "i", "й" => "y",
            "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f",
            "х" => "x", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ь" => "", "ы" => "i", "ъ" => "'", "э" => "e", "ю" => "yu", "я" => "ya",
            "ц" => "s", "қ" => "q", "ғ" => "g'", "ў" => "o'", "ҳ" => "h",

            "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "Yo", "Ж" => "J", "З" => "Z", "И" => "I", "Й" => "Y",
            "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F",
            "Х" => "X", "Ч" => "Ch", "Ш" => "Sh", "Щ" => "Sh", "Ь" => "", "Ы" => "I", "Ъ" => "'", "Э" => "E", "Ю" => "Yu", "Я" => "Ya",
            "Ц" => "S", "Қ" => "Q", "Ғ" => "G'", "Ў" => "O'", "Ҳ" => "H",
        );

        $textLatin = strtr($textCyrill, $array);

        return $textLatin;
    }

}
