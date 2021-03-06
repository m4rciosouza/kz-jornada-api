<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\Jornada;
use app\modules\v1\models\Gps;
use app\modules\v1\models\Usuario;
use app\modules\v1\models\Justificativa;
use Yii;
use yii\web\HttpException;
use yii\helpers\Json;

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
		
		try {
			$postData = Json::decode(Yii::$app->request->getBodyParam('data'));
			if(!is_array($postData) || count($postData) <= 0) {
				throw new HttpException(500, 'Erro obtendo dados do post');
			}
			
			$transaction = \Yii::$app->db->beginTransaction();
			$eventsIds = array();

			foreach($postData as $itemData) {
				$eventId = $itemData['eventId'];
				$usuario = $itemData['usuario'];
				$usuario = $this->obterUsuario($usuario);
				
				$justificativa = $this->cadastrarJustificativa($itemData['justificativa']);
				$jornada = $this->cadastrarJornada($usuario, $justificativa, $itemData);

				if(!is_numeric($eventId)) {
					$dataInicial = $this->parseDate($itemData['dataInicial']);
					$gpsInicial = $this->cadastrarGps($usuario->id_usuario, $itemData['initialGps'], $dataInicial);
				}
				
				$dataFinal = $this->parseDate($itemData['dataFinal']);
				if(empty($dataFinal)) {
					$eventsIds[] = array('eventId' => $eventId, 'remoteId' => $jornada->id, 'delete' => 'NO');
				} else {
					$eventsIds[] = array('eventId' => $eventId, 'delete' => 'OK');
					$gpsFinal = $this->cadastrarGps($usuario->id_usuario, $itemData['endGps'], $dataFinal);
				}
			}
			
			$transaction->commit();
			return ['ids' => $eventsIds];
		}
		catch(\Exception $e) {
			$transaction->rollBack();
			throw new HttpException(500, $e->getMessage());
		}	
	}
	
	private function cadastrarJornada($usuario, $justificativa, $itemData)
	{
		$eventId = $itemData['eventId'];
		$tipo = $itemData['tipo'];
		$dataInicial = $this->parseDate($itemData['dataInicial']);
		$dataFinal = $this->parseDate($itemData['dataFinal']);
		$imei = $itemData['imei'];
		$versao = $itemData['versao'];
	
		if(is_numeric($eventId)) {
			$jornada = Jornada::findOne($eventId);	
		} else {
			$jornada = new Jornada();
		}
		$jornada->id_usuario = $usuario->id_usuario;
		$jornada->id_jornada = '1';
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
			throw new HttpException(500, 'Erro cadastrando Jornada.' . json_encode($jornada->getErrors()));
		}
	
		return $jornada;
	}
	
	private function cadastrarJustificativa($descJustificativa)
	{
		if(empty($descJustificativa)) {
			return null;
		}
	
		$justificativa = new Justificativa();
		$justificativa->descricao = $descJustificativa;
	
		if(!$justificativa->save()) {
			throw new HttpException(500, 'Erro cadastrando Justificativa.' . json_encode($justificativa->getErrors()));
		}
	
		return $justificativa;
	}
	
	private function cadastrarGps($usuario, $latLong, $date)
	{
		if(empty($latLong)) {
			return null;
		}
		
		$gps = new Gps();
		$gps->id_usuario = $usuario;
		$gps->latlong = $latLong;
		$gps->data = $date;
	
		if(!$gps->save()) {
			throw new HttpException(500, 'Erro cadastrando GPS.' . json_encode($justificativa->getErrors()));
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