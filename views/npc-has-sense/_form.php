<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasSense $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-sense-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sense_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SenseType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'distance')->textInput(['value' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
