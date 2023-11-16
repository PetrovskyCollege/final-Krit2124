<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasHabitat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-habitat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_habitat_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\HabitatType::find()->all(), 'id','type')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
