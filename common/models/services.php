<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $service_id
 * @property string $service_name
 * @property integer $price
 * @property integer $status
 */
class services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_name', 'price', 'status'], 'required'],
            [['price', 'status'], 'integer'],
            [['service_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'service_name' => 'Service Name',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
