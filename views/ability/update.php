<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ability $model */

$this->title = 'Изменить особенность: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Abilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ability-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
