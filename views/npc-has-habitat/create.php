<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasHabitat $model */

$this->title = 'Присвоить новое место обитания';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Habitats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-habitat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
