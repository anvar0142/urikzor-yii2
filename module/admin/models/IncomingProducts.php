<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "incoming_products".
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property float $exch
 * @property float $selling_price
 * @property string $date
 * @property string $code
 *
 * @property Product $product
 */
class IncomingProducts extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'incoming_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'price', 'exch', 'selling_price', 'code'], 'required'],
            [['product_id', 'quantity'], 'integer'],
            [['price', 'exch', 'selling_price'], 'double'],
            [['code'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
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
            'quantity' => 'Quantity',
            'price' => 'Price',
            'exch' => 'Exch',
            'selling_price' => 'Selling Price',
            'date' => 'Date',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
