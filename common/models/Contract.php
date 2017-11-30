<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property integer $contract_code
 * @property string $contract_no
 * @property integer $status
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['contract_no', 'status', 'start_date', 'end_date', 'description'], 'required'],
            [['status'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['contract_no'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contract_code' => 'Contract Code',
            'contract_no' => 'Contract No',
            'status' => 'Status',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
        ];
    }
}
