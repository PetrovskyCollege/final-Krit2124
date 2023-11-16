<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasDamageImmunity $model */

$this->title = 'Присвоить новый иммунитет к урону';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Damage Immunities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-damage-immunity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
