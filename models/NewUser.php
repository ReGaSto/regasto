<?php

namespace app\models;

use Yii;
/**
 * To jest model klasy dla tabeli "new_user" stworzony w celu logowania i rejestracji użytkowników w bazie danych
 * 
 * @property int $id
 * @property string $username;
 * @property string $password;
 * @property string $authKey;
 * @property string $accessToken;
 */

class NewUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_user';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'unique'],    //pola muszą być jednoznaczne M. Kurant
            [['username', 'password', 'email'], 'required'],    //pola wymagane M. Kurant
            [['username', 'email'], 'string', 'max' => 80],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            ['email', 'email'],   //sprawdzanie poprawności adresu email M. Kurant
                ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Login',
            'email' => 'E-mail',
            'password' => 'Hasło',
                ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //foreach (self::$users as $user) {
        //    if ($user['accessToken'] === $token) {
        //        return new static($user);
        //    }
        
        return self::findOne(['accessToken'=>$token]);
        }

       // return null;
    //}

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //Zmieniono M.Kurant
        //foreach (self::$users as $user) {
        //    if (strcasecmp($user['username'], $username) === 0) {
        //        return new static($user);
        //    }
        
        return self::findOne(['username'=>$username]);
        }

        //return null;
    //}

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password; Zmieniono M. Kurant
        return password_verify($password, $this->password);
    }
}
