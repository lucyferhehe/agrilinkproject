<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $parent
 * @property integer $created_at
 * @property integer $updated_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'parent'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'alias', 'parent'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'parent' => 'Parent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
