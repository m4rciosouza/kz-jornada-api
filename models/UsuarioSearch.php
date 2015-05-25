<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_cliente', 'operador'], 'integer'],
            [['filial', 'id_integrador', 'nome', 'login', 'senha', 'perfil', 'data', 'ativo', 'email', 'cpf'], 'safe'],
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
        $query = Usuario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'id_cliente' => $this->id_cliente,
            'operador' => $this->operador,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'filial', $this->filial])
            ->andFilterWhere(['like', 'id_integrador', $this->id_integrador])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'perfil', $this->perfil])
            ->andFilterWhere(['like', 'ativo', $this->ativo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cpf', $this->cpf]);

        return $dataProvider;
    }
}
