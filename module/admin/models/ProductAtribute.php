<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "product_atribute".
 *
 * @property int $id
 * @property int $product_id
 * @property int $atribute_id
 * @property string $value
 */
class ProductAtribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_atribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'atribute_id', 'value'], 'required'],
            [['product_id', 'atribute_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'atribute_id' => 'Atribute ID',
            'value' => 'Value',
        ];
    }
}
