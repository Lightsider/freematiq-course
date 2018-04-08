<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tasklog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasklog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList($user) ?>

    <?= $form->field($model, 'id_task')->dropDownList($tasks)  ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result')->dropDownList([ 'false' => 'False', 'true' => 'True', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
