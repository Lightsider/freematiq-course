<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Организаторы';
?>


<style>
    table {
        margin:20px;
        min-width: 95%;
    }
    table tr td {
        padding: 18px;
        background-color: #54214e;
        box-shadow:inset 0 0 5px black;
    }
    td:hover
    {
        background-color: rgba(255,255,255,0.9);
    }
    .content
    {
        max-width: 800px;
    }
    th
    {
        padding-bottom: 10px;
    }
</style>

<table cellspacing='0'>
    <tr>
        <th style="text-align: center;" colspan="4"><?php echo Html::encode($this->title) ?></th>
    </tr>
    <tr>
        <td style="text-align: center; max-width: 50%;">
            <a href="https://altayctf.ru/" target="_blank">
                <img height="90" title="Техническое исполнение и сопровождение соревнования - команда SharLike" src="img/sharlike.jpg">
            </a>
        </td>
        <td style="text-align: center; max-width: 50%;">
            <a href="http://www.aciso.ru/" target="_blank">
                <img height="90" title="Ассоциация руководителей служб информационной безопасности" src="img/aciso.png">
            </a>
        </td>
        <td style="text-align: center; max-width: 50%;">
            <a href="http://www.altstu.ru/" target="_blank">
                <img height="90" title="Алтайский государственный технический университет им. И. И. Ползунова" src="img/altstu.png">
            </a>
        </td>
        <td style="text-align: center; max-width: 50%;">
            <a href="http://inbur.pro/" target="_blank">
                <img height="90" title="АНО ВО «Институт национальной безопасности и управления рисками»" src="img/inbur.png">
            </a>
        </td>
    </tr>
</table>
<table cellspacing='0'>
    <tr>
        <th style="text-align: center;" colspan="4">Партнеры</th>
    </tr>
    <tr>
        <td style="text-align: center; width: 50%;">
            <a href="http://www.rutp.ru/" target="_blank">
                <img height="70" title="Удостоверяющий центр БТП" src="img/btp.png">
            </a>
        </td>
        <td style="text-align: center; width: 50%;">
            <a href="http://www.rostelecom.ru/" target="_blank">
                <img height="70" title="Ростелеком" src="img/rostelecom.png">
            </a>
        </td>
        <td style="text-align: center; width: 50%;">
            <a href="http://www.sibsoc.ru/" target="_blank">
                <img height="70" title="Сибсоцбанк" src="img/sibsocbank.png">
            </a>
        </td>
        <td style="text-align: center; width: 50%;">
            <a href="http://apiorg.ru/" target="_blank">
                <img height="70" title="Ассоциация поддержки инноваций" src="img/api.png">
            </a>
        </td>
    </tr>
</table>
<table cellspacing='0'>
    <tr>
        <th style="text-align: center;" colspan="2">При поддержке</th>
    </tr>
    <tr>
        <td style="text-align: center; width: 50%;">
            <a href="http://www.educaltai.ru/" target="_blank">
                <img height="100" title="Министерство образования и науки Алтайского края" src="img/edu.png">
            </a>
        </td>
        <td style="text-align: center; width: 50%;">
            <a href="http://inform22.ru/" target="_blank">
                <img height="100" title="Управление связи и массовых коммуникаций Алтайского края" src="img/altaikomsvyaz.jpg">
            </a>
        </td>
    </tr>
</table>
<table cellspacing='0'>
    <tr>
        <th style="text-align: center;" colspan="2">Спонсор призового фонда</th>
    </tr>
    <tr>
        <td style="text-align: center; width: 50%;">
            <a href="http://www.kaspersky.ru/" target="_blank">
                <img height="100" title="Лаборатория Касперского" src="img/kaspersky.jpg">
            </a>
        </td>
    </tr>
</table>
