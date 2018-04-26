<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'method' => "post",
            'enctype'=>'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'admin' => 'Admin', 'user' => 'User', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <? if(isset($model->image))echo $form->field($model, 'image')->textInput(['maxlength' => true]);
    else echo $form->field($model, 'file')->fileInput(['accept'=>"image/*"]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
