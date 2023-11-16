<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasConditionImmunity $model */

$this->title = 'Изменить присвоенный иммунитет к состоянию: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Condition Immunities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="npc-has-condition-immunity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
