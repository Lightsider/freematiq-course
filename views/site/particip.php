<?php

/* @var $this yii\web\View */
/* @var $users \app\models\User[]|array */

use yii\helpers\Html;
$this->title = 'Участники';
?>


<p class="title"><?php echo Html::encode($this->title) ?></p>

<div class="full-block">
    <table class="teams" cellspacing="0">
        <tbody><tr>
            <th>№</th>
            <th>Логотип</th>
            <th>Команда</th>
            <th>Город</th>
            <th>Учебное заведение</th>
        </tr>
        <?php
        foreach ($users as $key=>$user):?>
        <tr>
            <td><?=$key+1?></td>
            <td><img src="<?=Html::encode($user->image)?>" height="80"></td>
            <td style="font-weight: bold;"><?=Html::encode($user->name)?></td>
            <td><?=Html::encode($user->city)?></td>
            <td><?=Html::encode($user->school)?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

