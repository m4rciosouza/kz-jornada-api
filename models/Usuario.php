<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $filial
 * @property string $id_integrador
 * @property string $nome
 * @property string $login
 * @property string $senha
 * @property string $perfil
 * @property integer $id_cliente
 * @property integer $operador
 * @property string $data
 * @property string $ativo
 * @property string $email
 * @property string $cpf
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filial', 'id_integrador', 'nome', 'login', 'senha', 'perfil', 'id_cliente', 'operador', 'email', 'cpf'], 'required'],
            [['id_cliente', 'operador'], 'integer'],
            [['data'], 'safe'],
            [['filial', 'id_integrador', 'senha'], 'string', 'max' => 10],
            [['nome'], 'string', 'max' => 60],
            [['login'], 'string', 'max' => 11],
            [['perfil'], 'string', 'max' => 3],
            [['ativo'], 'string', 'max' => 1],
            [['email'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 14]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => Yii::t('usuario', 'Id Usuario'),
            'filial' => Yii::t('usuario', 'Filial'),
            'id_integrador' => Yii::t('usuario', 'Id Integrador'),
            'nome' => Yii::t('usuario', 'Nome'),
            'login' => Yii::t('usuario', 'Usuário'),
            'senha' => Yii::t('usuario', 'Senha'),
            'perfil' => Yii::t('usuario', 'Perfil'),
            'id_cliente' => Yii::t('usuario', 'Id Cliente'),
            'operador' => Yii::t('usuario', 'Operador'),
            'data' => Yii::t('usuario', 'Data'),
            'ativo' => Yii::t('usuario', 'Ativo'),
            'email' => Yii::t('usuario', 'Email'),
            'cpf' => Yii::t('usuario', 'Cpf'),
        ];
    }
}
