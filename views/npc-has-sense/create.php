<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSense $model */

$this->title = 'Присвоить новое чувство';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Senses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-sense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
