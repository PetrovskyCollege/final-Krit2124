<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LegendaryAction $model */

$this->title = 'Изменить легендарное действие: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Legendary Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="legendary-action-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
