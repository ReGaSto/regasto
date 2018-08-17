<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stomatolodzy".
 *
 * @property int $id_stomatologa
 * @property string $imie
 * @property string $nazwisko
 * @property string $nazwa_uzytkownika
 * @property string $haslo
 */
class Stomatolodzy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stomatolodzy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko'], 'required'],
            [['imie', 'nazwisko'], 'string'],
            [['nazwa_uzytkownika', 'haslo'], 'string', 'max' => 11],
            [['nazwa_uzytkownika'], 'unique'],
            [['haslo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stomatologa' => Yii::t('app', 'Id Stomatologa'),
            'imie' => Yii::t('app', 'Imie'),
            'nazwisko' => Yii::t('app', 'Nazwisko'),
            'nazwa_uzytkownika' => Yii::t('app', 'Nazwa Uzytkownika'),
            'haslo' => Yii::t('app', 'Haslo'),
        ];
    }
    
    public function getDisplayName()
    {
        return $this->imie.' '.$this->nazwisko;
    }
}