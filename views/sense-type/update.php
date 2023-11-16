<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SenseType $model */

$this->title = 'Update Sense Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sense Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sense-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
