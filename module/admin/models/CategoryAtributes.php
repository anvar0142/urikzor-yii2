<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "category_atributes".
 *
 * @property int $id
 * @property int $category_id
 * @property int $atribute_id
 */
class CategoryAtributes extends \yii\db\ActiveRecord
{

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }


    public function getAtribute() {
        return $this->hasOne(Atribute::class, ['id' => 'atribute_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_atributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'atribute_id'], 'required'],
            [['category_id', 'atribute_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'atribute_id' => 'Atribute ID',
        ];
    }
}
