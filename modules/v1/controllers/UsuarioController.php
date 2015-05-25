<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;

class UsuarioController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\Usuario';
	
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
		];
	}
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'], $actions['create'], $actions['update'], $actions['view'], $actions['delete']);
		return $actions;
	}
	
	/**
	 * Método de autenticação de usuário.
	 * 
	 * @throws UnauthorizedHttpException
	 * @return json string
	 */
	public function actionAutenticar()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		
 		$usuario = Yii::$app->request->getBodyParam('usuario');
 		$senha = Yii::$app->request->getBodyParam('senha');
        $usuario = Usuario::findOne(['login' => $usuario]);
        
        if($usuario && $usuario->senha == $senha &&
        		$usuario->ativo == Usuario::ATIVO) {
        	return ['token' => md5($usuario->login . $senha)];
        }
        
        throw new UnauthorizedHttpException('Usuario/senha inválido(s)', 401);
	}
}