<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "procedure_fu".
 *
 * @property integer $pf_id
 * @property integer $procedure_id
 * @property string $fuid
 * @property string $description
 */
class ProcedureFu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procedure_fu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['procedure_id', 'fuid'], 'required'],
            [['procedure_id', 'fuid'], 'integer'],
            [['description'], 'string'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pf_id' => 'Pf ID',
            'procedure_id' => 'Procedure ID',
            'fuid' => 'Fuid',
            'description' => 'Description',
        ];
    }
}
