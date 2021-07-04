<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "atribute_value".
 *
 * @property int $id
 * @property string $name
 * @property int $atribute_id
 *
 * @property Atribute $atribute
 */
class AtributeValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atribute_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'atribute_id'], 'required'],
            [['name'], 'string'],
            [['atribute_id'], 'integer'],
            [['atribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => Atribute::className(), 'targetAttribute' => ['atribute_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'atribute_id' => 'Atribute ID',
        ];
    }

    /**
     * Gets query for [[Atribute]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtribute()
    {
        return $this->hasOne(Atribute::className(), ['id' => 'atribute_id']);
    }
}
