<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcHasLanguage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-has-language-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_language')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Language::find()->all(), 'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
