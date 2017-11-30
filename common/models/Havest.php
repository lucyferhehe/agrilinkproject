<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "havest".
 *
 * @property integer $havest_ID
 * @property integer $FuID
 * @property integer $UserID
 * @property double $khoiluong_thuhoach
 * @property integer $Ngayvanchuyen
 * @property integer $hinhthucvanchuyen
 * @property string $daichivanchuyen
 * @property integer $masp
 * @property string $hinhanh
 * @property integer $status
 * @property string $description
 * @property integer $ngaytao
 */
class Havest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'havest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
       
            [['havest_ID', 'FuID', 'UserID', 'Ngayvanchuyen', 'hinhthucvanchuyen', 'status', 'ngaytao'], 'integer'],
            [['khoiluong_thuhoach'], 'number'],
            [['daichivanchuyen', 'hinhanh', 'description','masp'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'havest_ID' => 'Havest  ID',
            'FuID' => 'Fu ID',
            'UserID' => 'User ID',
            'khoiluong_thuhoach' => 'Khoiluong Thuhoach',
            'Ngayvanchuyen' => 'Ngayvanchuyen',
            'hinhthucvanchuyen' => 'Hinhthucvanchuyen',
            'daichivanchuyen' => 'Daichivanchuyen',
            'masp' => 'Masp',
            'hinhanh' => 'Hinhanh',
            'status' => 'Status',
            'description' => 'Description',
            'ngaytao' => 'Ngaytao',
        ];
    }
}
