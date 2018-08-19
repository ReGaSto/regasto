<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kalendarz}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_date
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
            [['title', 'created_date'], 'required'],
            [['created_date'], 'safe'],
            [['id_stomatologa', 'id_pacjenta'], 'integer'],
            [['title', 'description'], 'string', 'max' => 64],
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
            'description' => 'Description',
            'created_date' => 'Created Date',
            'id_stomatologa' => 'Id Stomatologa',
            'id_pacjenta' => 'Id Pacjenta',
        ];
    }
}
