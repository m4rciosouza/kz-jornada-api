<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('usuario', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('usuario', 'Update'), ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('usuario', 'Delete'), ['delete', 'id' => $model->id_usuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('usuario', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario',
            'filial',
            'id_integrador',
            'nome',
            'login',
            'senha',
            'perfil',
            'id_cliente',
            'operador',
            'data',
            'ativo',
            'email:email',
            'cpf',
        ],
    ]) ?>

</div>
