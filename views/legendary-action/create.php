<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LegendaryAction $model */

$this->title = 'Создать новое легендарное действие';
$this->params['breadcrumbs'][] = ['label' => 'Legendary Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legendary-action-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
