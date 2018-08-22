<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kalendarz}}".
 *
 * @property int $id
 * @property string $title
 * @property string $data_rezerwacji
 * @property int $id_stomatologa
 * @property int $id_pacjenta
 */
class Kalendarz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kalendarz2}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'godzina'], 'required'],           
            [['id_stomatologa', 'id_pacjenta'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'data' => 'Data',
            'godzina' => 'Godzina',
            'id_stomatologa' => 'Id Stomatologa',
            'id_pacjenta' => 'Id Pacjenta',
        ];
    }
}
