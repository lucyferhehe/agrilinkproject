<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $product_id
 * @property string $product_name
 * @property integer $fuid
 * @property string $harvest_time
 * @property integer $price
 * @property string $description
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'fuid', 'harvest_time', 'price', 'description'], 'required'],
            [['fuid', 'price'], 'integer'],
            [['harvest_time'], 'safe'],
            [['product_name', 'description','hinhanh'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'fuid' => 'Fuid',
            'harvest_time' => 'Harvest Time',
            'price' => 'Price',
            'description' => 'Description',
            'hinhanh'=>'hinh anh'
        ];
    }
}
