<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fu".
 *
 * @property integer $fuid
 * @property string $fu_long
 * @property string $fu_lat
 * @property string $fu_width
 * @property string $fu_height
 * @property integer $fu_price
 * @property string $contract_id
 */
class fu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['fuid', 'fu_long', 'fu_lat', 'fu_width', 'fu_height', 'fu_price', 'contract_id','status'], 'required'],
            [['fuid', 'fu_price','status'], 'integer'],
            [['fu_long', 'fu_lat', 'contract_id'], 'string', 'max' => 200],
            [['fu_width', 'fu_height'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fuid' => 'Fuid',
            'fu_long' => 'Fu Long',
            'fu_lat' => 'Fu Lat',
            'fu_width' => 'Fu Width',
            'fu_height' => 'Fu Height',
            'fu_price' => 'Fu Price',
            'contract_id' => 'Contract ID',
            'status'=>'Status'
        ];
    }
}
