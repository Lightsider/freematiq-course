<?php

/* @var $this yii\web\View */

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
        <tr style="background-color: rgba(184,134,11,0.9)">
            <td>1</td>
            <td><img src="/img/game/format-c.jpg" height="80"></td>
            <td style="font-weight: bold;">Format C</td>
            <td>Барнаул</td>
            <td>КГБПОУ "Алтайский промышленно-экономический колледж"</td>
            <td>2000</td>
        </tr>
        <tr style="background-color: rgba(119,136,153,0.7)">
            <td>2</td>
            <td><img src="/img/game/gimn74.jpg" height="80"></td>
            <td style="font-weight: bold;">GIMN74</td>
            <td>Барнаул</td>
            <td>МБОУ "Гимназия №74"</td>
            <td>1900</td>
        </tr>
        <tr style="background-color: 	rgba(153, 95, 37, 0.8)">
            <td>3</td>
            <td><img src="/img/game/reidev.jpg" height="80"></td>
            <td style=" font-weight: bold;">ReiDev</td>
            <td>Барнаул</td>
            <td>Колледж Алтайского государственного университета</td>
            <td>1800</td>
        </tr>
        <tr>
            <td>4</td>
            <td><img src="/img/game/no_logo.png" height="80"></td>
            <td style=" font-weight: bold;">Леша +4</td>
            <td>Барнаул</td>
            <td>КГБПОУ "Алтайский архитектурно-строительный колледж"</td>
            <td>1790</td>
        </tr>
        <tr>
            <td>5</td>
            <td><img src="/img/game/iskateli.png" height="80"></td>
            <td style=" font-weight: bold;">Искатели</td>
            <td>Барнаул</td>
            <td>КГБПОУ "Алтайский политехнический техникум"</td>
            <td>1750</td>
        </tr>
        <tr>
            <td>6</td>
            <td><img src="/img/game/haters.jpg" height="80"></td>
            <td style=" font-weight: bold;">Haters_Love_Us</td>
            <td>Барнаул</td>
            <td>МБОУ "Гимназия №27" имени Героя Советского Союза В.Е. Смирнова</td>
            <td>1700</td>
        </tr>
        <tr>
            <td>7</td>
            <td><img src="/img/game/krab42.jpg" height="80"></td>
            <td style=" font-weight: bold;">Крабы42</td>
            <td>Барнаул</td>
            <td>МБОУ "Гимназия №42"</td>
            <td>1600</td>
        </tr>
        <tr>
            <td>8</td>
            <td><img src="/img/game/hacker.png" height="80"></td>
            <td style=" font-weight: bold;">FourAMa</td>
            <td>Барнаул</td>
            <td>КГБПОУ "Алтайский государственный колледж"</td>
            <td>1500</td>
        </tr>
        <tr>
            <td>9</td>
            <td><img src="/img/game/chipset.png" height="80"></td>
            <td style=" font-weight: bold;">Chipset</td>
            <td>Барнаул</td>
            <td>МБОУ "Лицей №101"</td>
            <td>1400</td>
        </tr>
        <tr>
            <td>10</td>
            <td><img src="/img/game/no_logo.png" height="80"></td>
            <td style=" font-weight: bold;">КГКП «Колледж радиотехники и связи»</td>
            <td>Семей (Казахстан)</td>
            <td>КГКП «Колледж радиотехники и связи»</td>
            <td>1300</td>
        </tr>
        <tr>
            <td>11</td>
            <td><img src="/img/game/no_logo.png" height="80"></td>
            <td style=" font-weight: bold;">МБОУ "Кытмановская СОШ №1"</td>
            <td>Кытманово</td>
            <td>МБОУ "Кытмановская СОШ №1"</td>
            <td>1200</td>
        </tr>
        <tr>
            <td>12</td>
            <td><img src="/img/game/good_guys.jpg" height="80"></td>
            <td style=" font-weight: bold;">Хорошие ребята</td>
            <td>Барнаул</td>
            <td>КГБОУ "Алтайский краевой педагогический лицей-интернат"</td>
            <td>1100</td>
        </tr>
        <tr>
            <td>13</td>
            <td><img src="/img/game/crack.png" height="80"></td>
            <td style=" font-weight: bold;">Кряк</td>
            <td>Бийск</td>
            <td>КГБОУ "Бийский лицей-интернат Алтайского края"</td>
            <td>1000</td>
        </tr>
        <tr>
            <td>14</td>
            <td><img src="/img/game/school72.png" height="80"></td>
            <td style=" font-weight: bold;">Ёжики</td>
            <td>Барнаул</td>
            <td>МБОУ "СОШ №72"</td>
            <td>900</td>
        </tr>
        <tr>
            <td>15</td>
            <td><img src="/img/game/bsod.jpg" height="80"></td>
            <td style=" font-weight: bold;">BSoD</td>
            <td>Барнаул</td>
            <td>КГБПОУ "Барнаульский государственный педагогический колледж"</td>
            <td>800</td>
        </tr>
        <tr>
            <td>16</td>
            <td><img src="/img/game/cookies.jpg" height="80"></td>
            <td style=" font-weight: bold;">Cookies</td>
            <td>Барнаул</td>
            <td>МБОУ "Гимназия №42"</td>
            <td>700</td>
        </tr>
        <tr>
            <td>17</td>
            <td><img src="/img/game/sigma.jpg" height="80"></td>
            <td style=" font-weight: bold;">Sigma</td>
            <td>Барнаул</td>
            <td>МБОУ "Лицей «Сигма»"</td>
            <td>600</td>
        </tr>
        </tbody>
    </table>
</div>
