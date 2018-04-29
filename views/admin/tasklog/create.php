<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tasklog */
/* @var $user array */
/* @var $tasks array */

$this->title = 'Create Tasklog';
$this->params['breadcrumbs'][] = ['label' => 'Tasklogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasklog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'tasks' => $tasks
    ]) ?>

</div>
