<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasConditionImmunity $model */

$this->title = 'Присвоить новый иммунитет к состоянию';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Condition Immunities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-condition-immunity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
