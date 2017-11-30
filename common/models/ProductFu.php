<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_fu".
 *
 * @property integer $fp_id
 * @property integer $fuid
 * @property integer $product_id
 */
class ProductFu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_fu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fuid', 'product_id'], 'required'],
            [['fuid', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fp_id' => 'Fp ID',
            'fuid' => 'Fuid',
            'product_id' => 'Product ID',
        ];
    }
}
