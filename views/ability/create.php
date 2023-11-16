<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ability $model */

$this->title = 'Создать новую особенность';
$this->params['breadcrumbs'][] = ['label' => 'Abilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ability-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
