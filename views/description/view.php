<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Description $model */

$this->title = "Описание существа ".$model->npc->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Descriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="description-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description:ntext',
            [
                'attribute' => 'id_npc',
                'value' => function ($model) {
                    return $model->npc->name_ru;
                },
            ],
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
