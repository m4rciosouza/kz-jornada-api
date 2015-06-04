<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JornadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('jornada', 'Jornadas');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jornada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php /* 
    <p>
        <?= Html::a(Yii::t('jornada', 'Create {modelClass}', [
    'modelClass' => 'Jornada',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    */ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
	            //'id',
	            //'id_usuario',
	            'imei',
	            'usuario.login',
	            //'id_jornada',
	            //'id_justificativa',
	            'tipoDesc',
	            'justificativa.descricao',
	            // 'tipo',
	            'dataInicioBr',
	            'dataFimBr',
	            // 'data_inicio',
	            // 'data_fim',
	            // 'obs:ntext',
	            // 'data_server',
	            // 'versao',
	            // 'operador',
	            'gpsInicio',
	            'gpsFim',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
