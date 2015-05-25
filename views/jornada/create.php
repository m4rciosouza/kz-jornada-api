<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::t('jornada', 'Create {modelClass}', [
    'modelClass' => 'Jornada',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('jornada', 'Jornadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jornada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
