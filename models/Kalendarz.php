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
        return '{{%kalendarz}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'data_rezerwacji'], 'required'],
            [['data_rezerwacji'], 'safe'],
            [['id_stomatologa', 'id_pacjenta'], 'integer'],
            [['title'], 'string', 'max' => 64],
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
            'data_rezerwacji' => 'Data rezerwacji',
            'id_stomatologa' => 'Id Stomatologa',
            'id_pacjenta' => 'Id Pacjenta',
        ];
    }
}
