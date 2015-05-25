<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gps */

$this->title = Yii::t('gps', 'Update {modelClass}: ', [
    'modelClass' => 'Gps',
]) . ' ' . $model->id_gps;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gps', 'Gps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gps, 'url' => ['view', 'id' => $model->id_gps]];
$this->params['breadcrumbs'][] = Yii::t('gps', 'Update');
?>
<div class="gps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
