<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%new_user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $role
 * @property string $mieszka
 * @property int $tel
 * @property string $imie
 * @property string $nazwisko
 * @property string $notatka
 * @property int $pesel
 */
class NewUserAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%new_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['role', 'tel', 'pesel'], 'integer'],
            [['username', 'email'], 'string', 'max' => 80],
            [['password', 'authKey', 'accessToken', 'mieszka'], 'string', 'max' => 255],
            [['imie'], 'string', 'max' => 25],
            [['nazwisko'], 'string', 'max' => 50],
            [['notatka'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
            'mieszka' => 'Mieszka',
            'tel' => 'Tel',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'notatka' => 'Notatka',
            'pesel' => 'Pesel',
        ];
    }
}
