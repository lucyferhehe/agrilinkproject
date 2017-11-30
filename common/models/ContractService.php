<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract_service".
 *
 * @property integer $cs_id
 * @property string $contract_no
 * @property integer $service_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $status
 */
class ContractService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_no', 'service_id'], 'required'],
            [['service_id', 'status'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cs_id' => 'Cs ID',
            'contract_no' => 'Contract No',
            'service_id' => 'Service ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
        ];
    }
}
