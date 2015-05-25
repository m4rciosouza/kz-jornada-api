<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GpsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gps') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'latlong') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('gps', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('gps', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
