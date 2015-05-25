<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filial')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'id_integrador')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'senha')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'perfil')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'operador')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'ativo')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => 14]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('usuario', 'Create') : Yii::t('usuario', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
