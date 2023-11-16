<?php

use app\models\NpcHasSense;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSenseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Чувства NPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-sense-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Присвоить новое чувство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_npc',
            'id_sense_type',
            'distance',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NpcHasSense $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
