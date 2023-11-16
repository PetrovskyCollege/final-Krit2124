<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NpcHasLanguage $model */

$this->title = 'Присвоить новый язык';
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-language-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
