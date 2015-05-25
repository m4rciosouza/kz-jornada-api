<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Justificativa */

$this->title = Yii::t('justificativa', 'Update {modelClass}: ', [
    'modelClass' => 'Justificativa',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('justificativa', 'Justificativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('justificativa', 'Update');
?>
<div class="justificativa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
