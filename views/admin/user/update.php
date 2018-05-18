<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterFormAdmin */
/* @var $user \app\models\User|null */

$this->title = 'Update User: '.$user->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->name, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user'=>$user
    ]) ?>

</div>
