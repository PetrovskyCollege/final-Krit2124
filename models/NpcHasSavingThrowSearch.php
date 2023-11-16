<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NpcHasSavingThrow;

/**
 * NpcHasSavingThrowSearch represents the model behind the search form of `app\models\NpcHasSavingThrow`.
 */
class NpcHasSavingThrowSearch extends NpcHasSavingThrow
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_npc', 'id_characteristic'], 'integer'],
            [['multiplier'], 'number'],
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
        $query = NpcHasSavingThrow::find();

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
            'id_npc' => $this->id_npc,
            'id_characteristic' => $this->id_characteristic,
            'multiplier' => $this->multiplier,
        ]);

        return $dataProvider;
    }
}
