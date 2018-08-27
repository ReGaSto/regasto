<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewUserAdmin;

/**
 * NewUserAdminSearch represents the model behind the search form of `app\models\NewUserAdmin`.
 */
class NewUserAdminSearch extends NewUserAdmin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'role', 'tel', 'pesel'], 'integer'],
            [['username', 'email', 'password', 'authKey', 'accessToken', 'mieszka', 'imie', 'nazwisko', 'notatka'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NewUserAdmin::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'role' => $this->role,
            'tel' => $this->tel,
            'pesel' => $this->pesel,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'mieszka', $this->mieszka])
            ->andFilterWhere(['like', 'imie', $this->imie])
            ->andFilterWhere(['like', 'nazwisko', $this->nazwisko])
            ->andFilterWhere(['like', 'notatka', $this->notatka]);

        return $dataProvider;
    }
}
