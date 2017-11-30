<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_different".
 *
 * @property integer $sverice_ID
 * @property string $name
 * @property string $description
 * @property integer $contractID
 * @property string $price
 * @property integer $status
 */
class ServiceDifferent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_different';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'contractID'], 'required'],
            [['description'], 'string'],
            [['contractID', 'status'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sverice_ID' => 'Sverice  ID',
            'name' => 'Name',
            'description' => 'Description',
            'contractID' => 'Contract ID',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
