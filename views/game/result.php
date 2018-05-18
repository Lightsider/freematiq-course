<?php

/* @var $this yii\web\View */
/* @var $users \app\models\User[]|array */

use yii\helpers\Html;

$this->title = 'Результаты';
?>

<style>
    .content
    {
        width: 1072px;
        padding: 10px;
        padding-top: 50px;
        background-color: rgba(0,0,0,0.7);
    }
</style>
<p class="title" style="margin-top: 0">Результаты</p>

<div class="full-block">
    <table class="teams" cellspacing="0">
        <tbody><tr>
            <th>№</th>
            <th>Логотип</th>
            <th>Команда</th>
            <th>Город</th>
            <th>Учебное заведение</th>
            <th>Очки</th>
        </tr>
        <?php
        foreach ($users as $key=>$user):?>
            <tr <?php if($key==0)echo "style='background-color: rgba(184,134,11,0.9)'";
            elseif($key==1)echo "style='background-color: rgba(119,136,153,0.7)'";
            elseif($key==2)echo "style='background-color: rgba(153, 95, 37, 0.8)'";
            ?>>
                <td><?=$key+1?></td>
                <td><img src="<?=Html::encode($user->getUploadPath())?>" height="80"></td>
                <td style="font-weight: bold;"><?=Html::encode($user->name)?></td>
                <td><?=Html::encode($user->city)?></td>
                <td><?=Html::encode($user->school)?></td>
                <td><?=Html::encode($user->score)?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
