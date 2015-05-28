<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jornada;

/**
 * JornadaSearch represents the model behind the search form about `app\models\Jornada`.
 */
class JornadaSearch extends Jornada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario', 'id_jornada', 'id_justificativa', 'operador'], 'integer'],
            [['tipo', 'data_inicio', 'data_fim', 'obs', 'imei', 'data_server', 'versao'], 'safe'],
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
        $query = Jornada::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'id_jornada' => $this->id_jornada,
            'id_justificativa' => $this->id_justificativa,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'data_server' => $this->data_server,
            'operador' => $this->operador,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'obs', $this->obs])
            ->andFilterWhere(['like', 'imei', $this->imei])
            ->andFilterWhere(['like', 'versao', $this->versao]);

        return $dataProvider;
    }
}
