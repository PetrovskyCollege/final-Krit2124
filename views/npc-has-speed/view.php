<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSpeed $model */

$this->title = 'Присвоенная скорость существу: ' . $model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Speeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="npc-has-speed-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_npc',
                'value' => function ($model) {
                    return $model->npc->name_ru;
                },
            ],
            [
                'attribute' => 'id_speed_type',
                'value' => function ($model) {
                    return $model->speedType->type;
                },
            ],
            'value',
        ],
    ]) ?>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эти данные?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['npc/view', 'id' => $model->id_npc], ['class' => 'btn btn-default']) ?>
    </p>

</div>
