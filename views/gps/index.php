<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GpsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('gps', 'Gps');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('gps', 'Create {modelClass}', [
    'modelClass' => 'Gps',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_gps',
            'id_usuario',
            'data',
            'latlong',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
