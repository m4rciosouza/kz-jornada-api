<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jornada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'id_jornada')->textInput() ?>

    <?= $form->field($model, 'id_justificativa')->textInput() ?>

    <?= $form->field($model, 'id_gps')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <?= $form->field($model, 'obs')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imei')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'data_server')->textInput() ?>

    <?= $form->field($model, 'versao')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'operador')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('jornada', 'Create') : Yii::t('jornada', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
