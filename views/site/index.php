<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Главная';



function splitIntoParagraphs($text)
{
    $arr=explode("\n",$text);
    $arr2=array();
    foreach ($arr as $key=>$paragraph)
    {
        if($paragraph!="") {
            if ($key == 0)
                $arr2[] = "<p class=\"first-p\">" . $paragraph . "</p><div style=\"clear: both\"></div>";
            else
                $arr2[] = "<p class=\"second-p\">" . $paragraph . "</p>";
        }
    }

    return implode("",$arr2);
}

?>



<p class="title">Добро пожаловать!</p>
<div class="information">
    <div class="info info-left">
        <p class="info-title"> Что такое CTF? </p>
        <p class="info-content">CTF («capture the flag» — захват флага) — соревнования по информационной безопасности. Побеждает тот, кто лучше разбирается в IT и быстро ориентируется в нестандартных ситуациях.
            Вас ждут задания в областях крипто- и стеганографии, программирования, веб-сайтов и сетевых протоколов и многих других!</p>
    </div>

    <div class="info info-right">
        <p class="info-title"> Как участвовать в <em style="font-family: Stencil,serif">SCHOOLCTF</em>? </p>
        <p class="info-content"> Собирайте команду единомышленников со своей школы или колледжа, подавайте заявку <?= Html::a('организаторам', ['site/contact']) ?> и начинайте готовиться — старт соревнований <b> 3 марта</b>.</p>
    </div>
    <div style="clear: both"></div>
</div>




<p class="title">Новости</p>
<?php
foreach ($news as $oneNews)
{
    ?>
    <div class="post">
        <p class="post-title"><?=Html::encode($oneNews->title)?></p>
        <div class="post-img">
            <img src="<?=Html::encode($oneNews->image);?>">
        </div>
        <div class="post-content">
        <?php echo splitIntoParagraphs(Html::encode($oneNews->text));?>
        </div>
    </div>
<?php
}
?>


