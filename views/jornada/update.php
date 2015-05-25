<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::t('jornada', 'Update {modelClass}: ', [
    'modelClass' => 'Jornada',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('jornada', 'Jornadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('jornada', 'Update');
?>
<div class="jornada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
