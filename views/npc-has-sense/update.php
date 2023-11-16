<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSense $model */

$this->title = 'Изменить присвоенное чувство: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Senses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="npc-has-sense-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
