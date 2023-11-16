<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasDamageImmunity $model */

$this->title = 'Изменить присвоенный иммунитет к урону: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Damage Immunities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="npc-has-damage-immunity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
