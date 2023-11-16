<?php

use app\models\NpcHasSpeed;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSpeedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Скорости NPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-speed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Присвоить новую скорость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_npc',
            'id_speed_type',
            'value',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NpcHasSpeed $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
