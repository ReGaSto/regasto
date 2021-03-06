<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "wizyty".
 *
 * @property int $id_pacjenta
 * @property int $id_stomatologa
 * @property string $data
 * @property string $godzina
 */
class Wizyty extends \yii\db\ActiveRecord
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wizyty';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'id_pacjenta',
                    'id_stomatologa',
                    'data',
                    'godzina'
                ],
                'required'
            ],
            [
                [
                    'id_pacjenta'
                ],
                'integer'
            ],
            [
                [
                    'id_stomatologa'
                ],
                'string'
            ],
            [
                [
                    'data',
                    'godzina'
                ],
                'safe'
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pacjenta' => Yii::t('app', 'Id Pacjenta'),
            'id_stomatologa' => Yii::t('app', 'Imię i nazwisko lekarza'),
            'data' => Yii::t('app', 'Data'),
            'godzina' => Yii::t('app', 'Godzina')
        ];
    }
}
