<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasDamageImmunity $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-damage-immunity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_damage_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\DamageType::find()->all(), 'id','type')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
