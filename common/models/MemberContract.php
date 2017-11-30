<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_contract".
 *
 * @property integer $mc_id
 * @property string $uid
 * @property string $contract_no
 * @property string $start_time
 * @property string $end_time
 * @property integer $status
 */
class MemberContract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_no',], 'required'],
            [['start_time', 'end_time'], 'safe'],
            [['status'], 'integer'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mc_id' => 'Mc ID',
            'uid' => 'Uid',
            'contract_no' => 'Contract No',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
        ];
    }
}
