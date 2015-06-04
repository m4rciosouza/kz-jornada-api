<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jornada".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $id_jornada
 * @property integer $id_justificativa
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
    
    public function getDataInicioBr()
    {
    	if($this->data_inicio) {
    		return Yii::$app->formatter->asDatetime($this->data_inicio, "php:d/m/Y H:i:s");
    	}
    	
    	return $this->data_inicio;
    }
    
    public function getDataFimBr()
    {
    	if($this->data_fim) {
    		return Yii::$app->formatter->asDatetime($this->data_fim, "php:d-m-Y H:i:s");
    	}
    	 
    	return $this->data_fim;
    }
    
    public function getUsuario()
    {
    	return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }
    
    public function getJustificativa()
    {
    	return $this->hasOne(Justificativa::className(), ['id' => 'id_justificativa']);
    }
    
    public function getGpsInicio()
    {
    	$gps = Gps::findOne(['id_usuario' => $this->id_usuario, 'data' => $this->data_inicio]);
    	
    	return $gps ? $gps->latlong : null;
    }
    
    public function getGpsFim()
    {
    	$gps = Gps::findOne(['id_usuario' => $this->id_usuario, 'data' => $this->data_fim]);
    	
    	return $gps ? $gps->latlong : null;
    }
    
    public function getTipoDesc() 
    {
    	$tipos = [
    		'1' => 'Aguardando liberação',
	    	'2' => 'Volante',
	    	'3' => 'Descanso 30 min',
	    	'4' => 'Refeição',
	    	'5' => 'Espera',
	    	'6' => 'Repouso',
	    	'7' => 'Folga'
	    ];
    	
    	return $tipos[$this->tipo];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_jornada', 'id_justificativa', 'tipo', 'data_inicio', 'data_fim', 'obs', 'imei', 'operador'], 'required'],
            [['id_usuario', 'id_jornada', 'id_justificativa', 'operador'], 'integer'],
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
            'tipo' => Yii::t('jornada', 'Tipo'),
            'data_inicio' => Yii::t('jornada', 'Data Inicio'),
            'data_fim' => Yii::t('jornada', 'Data Fim'),
            'obs' => Yii::t('jornada', 'Obs'),
            'imei' => Yii::t('jornada', 'Imei'),
            'data_server' => Yii::t('jornada', 'Data Server'),
            'versao' => Yii::t('jornada', 'Versao'),
            'operador' => Yii::t('jornada', 'Operador'),
        	'tipoDesc' => Yii::t('jornada', 'Tipo'),
        	'dataInicioBr' => Yii::t('jornada', 'Data Inicial'),
        	'dataFimBr' => Yii::t('jornada', 'Data Final'),
        	'gpsInicio' => Yii::t('jornada', 'GPS Inicial'),
        	'gpsFim' => Yii::t('jornada', 'GPS Final'),
        ];
    }
}
