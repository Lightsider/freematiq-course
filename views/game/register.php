<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

    <style>
        .content
        {
            padding-top: 100px;
        }
        .content
        {
            min-height: 71.9vh;
        }
    </style>
    <div class="module form-module">
        <div class="form">
            <h2>Зарегистритруйте свой аккаунт</h2>

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{input}\n{error}",
                    'labelOptions' => ['class' => ''],
                    'errorOptions' => ['class' => 'error'],
                ],
            ]); ?>
                <?=$form->field($model,'login')->textInput(['autofocus'=>'true','placeholder'=>'Логин'])?>
                <?=$form->field($model,'password')->passwordInput(['placeholder'=>'Пароль'])?>
                <?=$form->field($model,'name')->textInput(['placeholder'=>'Название команды'])?>
                <?=$form->field($model,'school')->textInput(['placeholder'=>'Учебное заведение'])?>
                <?=$form->field($model,'city')->textInput(['placeholder'=>'Город'])?>
                <?= Html::submitButton('Register', ['class' => '', 'name' => 'register-button'])?>
        </div>
        <?php ActiveForm::end(); ?>
        <?= Html::a('Или войти', ['game/login']) ?>
    </div>

