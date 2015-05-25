<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gps;

/**
 * GpsSearch represents the model behind the search form about `app\models\Gps`.
 */
class GpsSearch extends Gps
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gps', 'id_usuario'], 'integer'],
            [['data', 'latlong'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Gps::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_gps' => $this->id_gps,
            'id_usuario' => $this->id_usuario,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'latlong', $this->latlong]);

        return $dataProvider;
    }
}
