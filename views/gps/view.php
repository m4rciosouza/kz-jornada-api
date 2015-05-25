<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gps */

$this->title = $model->id_gps;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gps', 'Gps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('gps', 'Update'), ['update', 'id' => $model->id_gps], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('gps', 'Delete'), ['delete', 'id' => $model->id_gps], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('gps', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_gps',
            'id_usuario',
            'data',
            'latlong',
        ],
    ]) ?>

</div>
