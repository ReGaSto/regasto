<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%stomatolodzy}}".
 *
 * @property int $id_stomatologa
 * @property string $imie_nazwisko
 * @property string $dni_pracy
 */
class StomatolodzyAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%stomatolodzy}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imie_nazwisko', 'dni_pracy'], 'required'],
            [['imie_nazwisko'], 'string'],
            [['dni_pracy'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stomatologa' => 'Id Stomatologa',
            'imie_nazwisko' => 'Imie Nazwisko',
            'dni_pracy' => 'Dni Pracy',
        ];
    }
}
