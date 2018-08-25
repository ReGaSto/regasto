<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WizytySearch represents the model behind the search form of `app\models\Wizyty`.
 */
class WizytySearch extends Wizyty
{

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with vacant dates search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchVacant($params)
    {
        $query = Wizyty::find();
        
        // add conditions that should always apply here
        
        $query->select([
            'data',
            'godzina',
            'id_stomatologa'
        ])
            ->where([
            '>=',
            'data',
            'DATE(NOW())'
        ])
            ->andWhere([
            '=',
            'id_pacjenta',
            0
        ])
            ->orderBy([
            'data' => SORT_ASC,
            'godzina' => SORT_ASC
        ])
            ->all();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $this->load($params);
        
        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            
            'id_stomatologa' => $this->id_stomatologa,
            'data' => $this->data,
            'godzina' => $this->godzina
        ]);
        
        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with booked dates search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchBooked($params)
    {
        $query = Wizyty::find();
        
        $query->select([
            'data',
            'godzina',
            'id_stomatologa'
        ])
            ->where([
            '=',
            'id_pacjenta',
            Yii::$app->user->identity->id
        ])
            ->orderBy([
            'data' => SORT_ASC,
            'godzina' => SORT_ASC
        ])
            ->all();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $this->load($params);
        
        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            
            'id_stomatologa' => $this->id_stomatologa,
            'data' => $this->data,
            'godzina' => $this->godzina
        ]);
        
        return $dataProvider;
    }
}
