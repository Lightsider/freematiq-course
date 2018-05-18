<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterFormAdmin*/
/* @var $form yii\widgets\ActiveForm */
/* @var $user app\models\User */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'method' => "post",
            'enctype'=>'multipart/form-data'
        ]
    ]); ?>

    <?php if(!isset($user)):?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'user' => 'User','admin' => 'Admin' ]) ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <?php if(isset($model->image))echo $form->field($model, 'image')->textInput(['maxlength' => true]);
    else echo $form->field($model, 'file')->fileInput(['accept'=>"image/*"]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?php else:?>

        <?= $form->field($model, 'login')->textInput(['maxlength' => true,'value'=>Html::encode($user->login)??""]) ?>

        <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'value'=>Html::encode($user->password_hash)??""]) ?>

        <?= $form->field($model, 'status')->dropDownList([ 'user' => 'User','admin' => 'Admin'  ]) ?>

        <?= $form->field($model, 'score')->textInput(['value'=>Html::encode($user->score)??""]) ?>

        <?php if(isset($user->image))echo $form->field($model, 'image')->textInput(['maxlength' => true,'value'=>Html::encode($user->image)??""]);
        echo $form->field($model, 'file')->fileInput(['accept'=>"image/*"]);
        ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true,'value'=>Html::encode($user->name)??""]) ?>

        <?= $form->field($model, 'school')->textInput(['maxlength' => true,'value'=>Html::encode($user->school)??""]) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true,'value'=>Html::encode($user->city)??""]) ?>

    <?php endif;?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
