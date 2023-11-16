<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSavingThrow $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-saving-throw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_characteristic')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\CharacteristicForSavingThrow::find()->all(), 'id','characteristic')) ?>

    <?= $form->field($model, 'multiplier')->textInput(['value' => 1])  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
