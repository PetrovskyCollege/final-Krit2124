<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSense $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Npc Has Senses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="npc-has-sense-view">

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
                'attribute' => 'id_sense_type',
                'value' => function ($model) {
                    return $model->senseType->type;
                },
            ],
            'distance',
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
