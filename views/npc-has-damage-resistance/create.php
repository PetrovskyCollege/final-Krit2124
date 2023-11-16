<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasDamageResistance $model */

$this->title = 'Присвоить новое сопротивление к урону';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Damage Resistances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-damage-resistance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
