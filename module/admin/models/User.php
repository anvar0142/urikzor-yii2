<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $role
 * @property string|null $token
 * @property string $email
 * @property int $status
 */
class User extends \yii\db\ActiveRecord
{
    public $send_email;

    public function getProduct() {
        return $this->hasMany(Product::class, ['seller_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'username', 'password', 'email'], 'required'],
            [['name', 'surname'], 'string'],
            [['status'], 'integer'],
            [['username', 'auth_key', 'password', 'role', 'token', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['token'], 'unique'],
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
            'surname' => 'Surname',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'role' => 'Role',
            'token' => 'Token',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
