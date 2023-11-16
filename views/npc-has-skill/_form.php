<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSkill $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-skill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_skill_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SkillType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'multiplier')->textInput(['value' => 1])  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
