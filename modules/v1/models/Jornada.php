<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "jornada".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $id_jornada
 * @property integer $id_justificativa
 * @property integer $id_gps
 * @property string $tipo
 * @property string $data_inicio
 * @property string $data_fim
 * @property string $obs
 * @property string $imei
 * @property string $data_server
 * @property string $versao
 * @property integer $operador
 */
class Jornada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jornada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_jornada', 'id_gps', 'tipo', 'data_inicio', 'obs', 'imei', 'operador'], 'required'],
            [['id_usuario', 'id_jornada', 'id_justificativa', 'id_gps', 'operador'], 'integer'],
            [['data_inicio', 'data_fim', 'data_server'], 'safe'],
            [['obs'], 'string'],
            [['tipo'], 'string', 'max' => 1],
            [['imei'], 'string', 'max' => 200],
            [['versao'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('jornada', 'ID'),
            'id_usuario' => Yii::t('jornada', 'Id Usuario'),
            'id_jornada' => Yii::t('jornada', 'Id Jornada'),
            'id_justificativa' => Yii::t('jornada', 'Id Justificativa'),
            'id_gps' => Yii::t('jornada', 'Id Gps'),
            'tipo' => Yii::t('jornada', 'Tipo'),
            'data_inicio' => Yii::t('jornada', 'Data Inicio'),
            'data_fim' => Yii::t('jornada', 'Data Fim'),
            'obs' => Yii::t('jornada', 'Obs'),
            'imei' => Yii::t('jornada', 'Imei'),
            'data_server' => Yii::t('jornada', 'Data Server'),
            'versao' => Yii::t('jornada', 'Versao'),
            'operador' => Yii::t('jornada', 'Operador'),
        ];
    }
}
