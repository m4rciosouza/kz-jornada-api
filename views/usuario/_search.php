<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'filial') ?>

    <?= $form->field($model, 'id_integrador') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'login') ?>

    <?php // echo $form->field($model, 'senha') ?>

    <?php // echo $form->field($model, 'perfil') ?>

    <?php // echo $form->field($model, 'id_cliente') ?>

    <?php // echo $form->field($model, 'operador') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'ativo') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'cpf') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('usuario', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('usuario', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
