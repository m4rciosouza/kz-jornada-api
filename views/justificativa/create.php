<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Justificativa */

$this->title = Yii::t('justificativa', 'Create {modelClass}', [
    'modelClass' => 'Justificativa',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('justificativa', 'Justificativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="justificativa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
