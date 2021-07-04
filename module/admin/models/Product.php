<?php

namespace app\module\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $seller_id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string $description
 * @property string $keywords
 * @property string $img
 * @property string $adt_imgs
 * @property int $is_offer
 * @property string $atributes
 * @property int $code
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    public $images;

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content', 'price', 'code'], 'required'],
            [['category_id'], 'integer'],
            [['title', 'content', 'description', 'keywords', 'code'], 'string'],
            [['price'], 'number'],
            [['images'], 'file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'title' => 'Title',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'atributes' => 'Atributes',
        ];
    }
}
