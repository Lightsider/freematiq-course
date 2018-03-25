<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;

if(!Yii::$app->user->isGuest)
{
    $user=new \app\models\User();
    $user=\app\models\User::findIdentity(Yii::$app->user->id);
}
?>
<div class="site-login">
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
            <?php if(Yii::$app->user->isGuest):?>

            <h2>Войдите в свой аккаунт</h2>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{input}\n<p class=\"error\">{error}</p>",
                    'labelOptions' => ['class' => ''],
                ],
            ]); ?>
            <?=$form->field($model,'login')->textInput(['autofocus'=>'true','placeholder'=>'Логин'])?>
            <?=$form->field($model,'password')->passwordInput(['placeholder'=>'Пароль'])?>
            <?= Html::submitButton('Login', ['class' => '', 'name' => 'login-button'])?>

        </div>
        <?php ActiveForm::end(); ?>
        <?= Html::a('Или зарегистрироваться', ['game/register']) ?>
<!--        <p class="error">Неверный логин или пароль</p>-->
        <?php else:?>
        <div class="form">
            <h2>Вы уже авторизованы как <?php echo $user->name ?></h2>
            <br>
            <?php echo Html::beginForm(['/game/logout'], 'post');
            echo Html::submitButton('Выйти');
            echo Html::endForm();
            ?>
        </div>
        <?php endif;?>
    </div>
</div>
