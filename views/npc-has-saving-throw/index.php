<?php

use app\models\NpcHasSavingThrow;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSavingThrowSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Владения спасбросками у NPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-saving-throw-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Присвоить новый спасбросок', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_npc',
            'id_characteristic',
            'multiplier',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NpcHasSavingThrow $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
