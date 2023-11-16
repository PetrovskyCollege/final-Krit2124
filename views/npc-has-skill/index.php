<?php

use app\models\NpcHasSkill;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSkillSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Владения навыками у NPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-has-skill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Присвоить новый навык', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_npc',
            'id_skill_type',
            'multiplier',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NpcHasSkill $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
