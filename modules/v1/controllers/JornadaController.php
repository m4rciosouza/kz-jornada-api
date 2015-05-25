<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\Jornada;
use app\modules\v1\models\Gps;
use app\modules\v1\models\Usuario;
use app\modules\v1\models\Justificativa;
use Yii;
use yii\web\HttpException;

class JornadaController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\Jornada';
	
	public $serializer = [
			'class' => 'yii\rest\Serializer',
			'collectionEnvelope' => 'items',
	];
	
	public function behaviors()
	{
		return [
				'corsFilter' => [
						'class' => \yii\filters\Cors::className(),
				],
				/*'authenticator' => [
						'class' => HttpJwtAuth::className(),
				]*/
		];
	}
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'], $actions['create'], $actions['update'], $actions['view'], $actions['delete']);
		return $actions;
	}
	
	public function actionCadastrar()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		
		$eventId = Yii::$app->request->getBodyParam('eventId');
		$transaction = \Yii::$app->db->beginTransaction();
		try {			
			$usuario = Yii::$app->request->getBodyParam('usuario');
			$usuario = $this->obterUsuario($usuario);
			$gps = $this->cadastrarGps($usuario->id_usuario);
			$justificativa = $this->cadastrarJustificativa();
			$jornada = $this->cadastrarJornada($usuario, $gps, $justificativa);
			$transaction->commit();
	        return ['id' => $jornada->id, 'eventId' => $eventId];
		}
		catch(\Exception $e) {
			$transaction->rollBack();
			throw new HttpException(500, $e->getMessage());
		}
	}
	
	private function cadastrarJornada($usuario, $gps, $justificativa) 
	{
		$tipo = Yii::$app->request->getBodyParam('tipo');
		$dataInicial = $this->parseDate(Yii::$app->request->getBodyParam('dataInicial'));
		$dataFinal = $this->parseDate(Yii::$app->request->getBodyParam('dataFinal'));
		$imei = Yii::$app->request->getBodyParam('imei');
		$versao = Yii::$app->request->getBodyParam('versao');
		
		$jornada = new Jornada();
		$jornada->id_usuario = $usuario->id_usuario;
		$jornada->id_jornada = '1';
		$jornada->id_gps = $gps->id_gps;
		$jornada->tipo = $tipo;
		$jornada->data_inicio = $dataInicial;
		$jornada->data_fim = $dataFinal;
		$jornada->obs = 'obs';
		$jornada->imei = $imei;
		$jornada->versao = $versao;
		$jornada->operador = '1';
		if($justificativa) {
			$jornada->id_justificativa = $justificativa->id;
		}
		
		if(!$jornada->save()) {
			throw new \Exception('Erro cadastrando Jornada.', 500);
		}
		
		return $jornada;
	}
	
	private function cadastrarJustificativa()
	{
		$descJustificativa = Yii::$app->request->getBodyParam('justificativa');
		
		if(empty($descJustificativa)) {
			return null;
		}
		
		$justificativa = new Justificativa();
		$justificativa->descricao = $descJustificativa;
	
		if(!$justificativa->save()) {
			throw new \Exception('Erro cadastrando Justificativa.', 500);
		}
	
		return $justificativa;
	}
	
	private function cadastrarGps($usuario) 
	{
		$latLong = Yii::$app->request->getBodyParam('gps');
		
		$gps = new Gps();
		$gps->id_usuario = $usuario;
		$gps->latlong = $latLong;
		
		if(!$gps->save()) {
			throw new \Exception('Erro cadastrando GPS', 500);
		}
		
		return $gps;
	}
	
	private function obterUsuario($usuario) 
	{
		$usuario = Usuario::findOne(['login' => $usuario]);
		
		if(!$usuario) {
			throw new \Exception('Erro carregando usuario', 500);
		}
		
		return $usuario;
	}
	
	private function parseDate($date) 
	{
		if(empty($date) || strlen($date) != 19) {
			return '';
		}
		
		$arrDateTime = explode(' ', $date);
		$arrDate = explode('/', $arrDateTime[0]);
		$arrTime = $arrDateTime[1];
			
		return "{$arrDate[2]}-{$arrDate[1]}-{$arrDate[0]} {$arrTime}";
	}
}