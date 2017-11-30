<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract_fu".
 *
 * @property integer $fc_id
 * @property integer $fuid
 * @property integer $contractid
 */
class ContractFu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_fu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fuid', 'contractid'], 'required'],
            [['fuid', 'contractid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fc_id' => 'Fc ID',
            'fuid' => 'Fuid',
            'contractid' => 'Contractid',
        ];
    }
}
