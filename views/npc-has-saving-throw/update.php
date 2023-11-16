<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSavingThrow $model */

$this->title = 'Изменить присвоенный спасбросок: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Saving Throws', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="npc-has-saving-throw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
