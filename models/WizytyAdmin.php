<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wizyty}}".
 *
 * @property int $id_pacjenta
 * @property string $id_stomatologa
 * @property string $data
 * @property string $godzina
 */
class WizytyAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wizyty}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pacjenta'], 'integer'],
            [['id_stomatologa', 'data', 'godzina'], 'required'],
            [['data', 'godzina'], 'safe'],
            [['id_stomatologa'], 'string', 'max' => 30],
            [['data', 'godzina'], 'unique', 'targetAttribute' => ['data', 'godzina']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pacjenta' => 'Id Pacjenta',
            'id_stomatologa' => 'Id Stomatologa',
            'data' => 'Data',
            'godzina' => 'Godzina',
        ];
    }
}
