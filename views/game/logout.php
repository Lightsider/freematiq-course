<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Выйти?';
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
                <h2>Вы уже авторизованы как <?php echo $user->name ?></h2>
                <br>

                <?php $form = ActiveForm::begin([
                    'id' => 'logout-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "",
                        'labelOptions' => ['class' => ''],
                    ],
                ]); ?>
                <?= Html::submitButton('Выйти', ['class' => '', 'name' => 'logout-button'])?>
            </div>
    </div>
</div>
