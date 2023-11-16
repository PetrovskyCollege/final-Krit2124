<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSpeed $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-speed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_speed_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SpeedType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'value')->textInput(['value' => 30])  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
