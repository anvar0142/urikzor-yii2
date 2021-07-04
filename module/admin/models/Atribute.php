<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "atribute".
 *
 * @property int $id
 * @property string $title
 *
 * @property AtributeValue[] $atributeValues
 */
class Atribute extends \yii\db\ActiveRecord
{
    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'unique'],
            [['title'], 'string'],
            [['custom_value'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[AtributeValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtributeValues()
    {
        return $this->hasMany(AtributeValue::className(), ['atribute_id' => 'id']);
    }
}
