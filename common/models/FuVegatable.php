<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fu_vegatable".
 *
 * @property integer $fv_id
 * @property integer $product_id
 * @property integer $fu_id
 */
class FuVegatable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fu_vegatable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'fu_id','status','date1','date2','status_thue'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fv_id' => 'Fv ID',
            'product_id' => 'Product ID',
            'fu_id' => 'Fu ID',
        		'status'=>'Status',
        		'date1'=>'Date1',
        		'date2'=>'Date2',
                        'status_thue'=>'status_thue'
        ];
    }
}
