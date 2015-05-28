<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('jornada', 'Jornadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jornada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('jornada', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('jornada', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('jornada', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_usuario',
            'id_jornada',
            'id_justificativa',
            'tipo',
            'data_inicio',
            'data_fim',
            'obs:ntext',
            'imei',
            'data_server',
            'versao',
            'operador',
        ],
    ]) ?>

</div>
