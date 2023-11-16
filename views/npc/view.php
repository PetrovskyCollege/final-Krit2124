<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Npc $model */

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="npc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name_ru',
            'name_eng',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img($model->image, ['alt' => 'Image']);
                },
            ],
            'danger_level',
            'armor_class',
            [
                'label' => 'Скорости',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasSpeeds = $model->npcHasSpeeds;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasSpeeds as $npcHasSpeed) {
                        $output .= '<li>' . Html::encode($npcHasSpeed->speedType->type) . ' ' . Html::encode($npcHasSpeed->value) . ' фт.';
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-speed/view', 'id' => $npcHasSpeed->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-speed/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            'average_hits',
            [
                'attribute' => 'Кости хитов',
                'value' => function ($model) {
                    return $model->hit_dice_amount . "d" . $model->hit_dice_type . "+" . $model->hit_dice_modifier;
                },
            ],
            'skill_bonus',
            [
                'attribute' => 'Сила',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->strength);
                },
            ],
            [
                'attribute' => 'Ловкость',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->dexterity);
                },
            ],
            [
                'attribute' => 'Телосложение',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->constitution);
                },
            ],
            [
                'attribute' => 'Интеллект',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->intelligence);
                },
            ],
            [
                'attribute' => 'Мудрость',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->wisdom);
                },
            ],
            [
                'attribute' => 'Харизма',
                'value' => function ($model) {
                    return $model->calculateModifierForView($model->charisma);
                },
            ],
            [
                'label' => 'Спасброски',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasSavingThrows = $model->npcHasSavingThrows;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasSavingThrows as $npcHasSavingThrow) {
                        $output .= '<li>' . Html::encode($npcHasSavingThrow->characteristic->characteristic) . ' ' . Html::encode($model->calculateSavingThrowForView($npcHasSavingThrow->id_characteristic, $npcHasSavingThrow->multiplier));
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-saving-throw/view', 'id' => $npcHasSavingThrow->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-saving-throw/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Навыки',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasSkills = $model->npcHasSkills;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasSkills as $npcHasSkill) {
                        $output .= '<li>' . Html::encode($npcHasSkill->skillType->type) . ' ' . Html::encode($model->calculateSkillForView($npcHasSkill->id_skill_type, $npcHasSkill->multiplier));
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-skill/view', 'id' => $npcHasSkill->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-skill/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Иммунитеты к состояниям',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasConditionImmunities = $model->npcHasConditionImmunities;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasConditionImmunities as $npcHasConditionImmunity) {
                        $output .= '<li>' . Html::encode($npcHasConditionImmunity->conditionType->type);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-condition-immunity/view', 'id' => $npcHasConditionImmunity->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-condition-immunity/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Иммунитеты к урону',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasDamageImmunities = $model->npcHasDamageImmunities;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasDamageImmunities as $npcHasDamageImmunity) {
                        $output .= '<li>' . Html::encode($npcHasDamageImmunity->damageType->type);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-damage-immunity/view', 'id' => $npcHasDamageImmunity->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-damage-immunity/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Сопротивления к урону',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasDamageResistances = $model->npcHasDamageResistances;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasDamageResistances as $npcHasDamageResistance) {
                        $output .= '<li>' . Html::encode($npcHasDamageResistance->damageType->type);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-damage-resistance/view', 'id' => $npcHasDamageResistance->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-damage-resistance/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Уязвимости к урону',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasDamageVulnerabilities = $model->npcHasDamageVulnerabilities;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasDamageVulnerabilities as $npcHasDamageVulnerability) {
                        $output .= '<li>' . Html::encode($npcHasDamageVulnerability->damageType->type);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-damage-vulnerability/view', 'id' => $npcHasDamageVulnerability->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-damage-vulnerability/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Чувства',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasSenses = $model->npcHasSenses;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasSenses as $npcHasSense) {
                        $output .= '<li>' . Html::encode($npcHasSense->senseType->type) . ' ' . Html::encode($npcHasSense->distance) . ' фт.';
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-sense/view', 'id' => $npcHasSense->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-sense/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'attribute' => 'id_size',
                'value' => function ($model) {
                    return $model->size->type;
                },
            ],
            [
                'attribute' => 'id_species',
                'value' => function ($model) {
                    return $model->species->type;
                },
            ],
            [
                'attribute' => 'id_subspecies',
                'value' => function ($model) {
                    return $model->subspecies->type;
                },
            ],
            [
                'attribute' => 'id_worldview',
                'value' => function ($model) {
                    return $model->worldview->type;
                },
            ],
            [
                'label' => 'Языки',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasLanguages = $model->npcHasLanguages;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasLanguages as $npcHasLanguage) {
                        $output .= '<li>' . Html::encode($npcHasLanguage->language->name);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-language/view', 'id' => $npcHasLanguage->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-language/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Особенности',
                'format' => 'raw',
                'value' => function ($model) {
                    $abilities = $model->abilities;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($abilities as $ability) {
                        $output .= '<li>' . Html::encode($ability->description);
                        $output .= ' ' . Html::a('Просмотр', ['ability/view', 'id' => $ability->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['ability/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) {
                    $actions = $model->actions;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($actions as $action) {
                        $output .= '<li>' . Html::encode($action->description);
                        $output .= ' ' . Html::a('Просмотр', ['action/view', 'id' => $action->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['action/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Легендарные действия',
                'format' => 'raw',
                'value' => function ($model) {
                    $legendaryActions = $model->legendaryActions;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($legendaryActions as $legendaryAction) {
                        $output .= '<li>' . Html::encode($legendaryAction->description);
                        $output .= ' ' . Html::a('Просмотр', ['legendary-action/view', 'id' => $legendaryAction->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['legendary-action/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Описание',
                'format' => 'raw',
                'value' => function ($model) {
                    $descriptions = $model->descriptions;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($descriptions as $description) {
                        $output .= '<li>' . Html::encode($description->description);
                        $output .= ' ' . Html::a('Просмотр', ['description/view', 'id' => $description->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['description/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'label' => 'Места обитания',
                'format' => 'raw',
                'value' => function ($model) {
                    $npcHasHabitats = $model->npcHasHabitats;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($npcHasHabitats as $npcHasHabitat) {
                        $output .= '<li>' . Html::encode($npcHasHabitat->habitatType->type);
                        $output .= ' ' . Html::a('Просмотр', ['npc-has-habitat/view', 'id' => $npcHasHabitat->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить', ['npc-has-habitat/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'attribute' => 'id_created_by',
                'value' => function ($model) {
                    return $model->createdBy ? $model->createdBy->username : 'Не задан';
                },
            ],
            'is_approved_by_admin:boolean',
            'is_named:boolean',
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
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-default']) ?>
    </p>
</div>
