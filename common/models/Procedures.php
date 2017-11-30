<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "procedures".
 *
 * @property integer $procedure_id
 * @property string $procedure_name
 * @property integer $product_id
 * @property string $description
 * @property string $image
 */
class Procedures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procedures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['description'], 'string'],
            [['procedure_name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'procedure_id' => 'Procedure ID',
            'procedure_name' => 'Procedure Name',
            'product_id' => 'Product ID',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
}
