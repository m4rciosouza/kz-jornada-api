<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JornadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jornada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_jornada') ?>

    <?= $form->field($model, 'id_justificativa') ?>

    <?= $form->field($model, 'id_gps') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'data_inicio') ?>

    <?php // echo $form->field($model, 'data_fim') ?>

    <?php // echo $form->field($model, 'obs') ?>

    <?php // echo $form->field($model, 'imei') ?>

    <?php // echo $form->field($model, 'data_server') ?>

    <?php // echo $form->field($model, 'versao') ?>

    <?php // echo $form->field($model, 'operador') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('jornada', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('jornada', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
