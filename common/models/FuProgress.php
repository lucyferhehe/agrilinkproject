<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fu_progress".
 *
 * @property integer $progressid
 * @property integer $fuid
 * @property string $date
 * @property string $img
 * @property string $description
 * @property string $Process-name
 * @property integer $step
 * @property integer $status
 * @property integer $created_at
 * @property integer $update_at
 */
class FuProgress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fu_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fuid'], 'required'],
            [['fuid', 'date', 'step', 'status', 'created_at', 'update_at'], 'integer'],
            [['description'], 'string'],
            [['img', 'Process_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'progressid' => 'Progressid',
            'fuid' => 'Fuid',
            'date' => 'Date',
            'img' => 'Img',
            'description' => 'Description',
            'Process-name' => 'Process Name',
            'step' => 'Step',
            'status' => 'Status',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
