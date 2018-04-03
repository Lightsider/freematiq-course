<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Задания';
?>
<div class="sidebar">
    <h2> Категории: </h2>
    <ul>
        <?php foreach($category as $i=>$cat):?>

        <?php if($i===0):?>
        <li class="sideline" id="all" onclick="view('<?= Html::encode($cat["title"])?>')" style="background-color: rgb(2, 149, 255); color: white;">
        <?php else:?>
        <li class="sideline" id="all" onclick="view('<?= Html::encode($cat["title"])?>')">
        <?php endif;?>
        <?=Html::encode($cat['title'])?>
        </li>
        <?php endforeach;?>
    </ul>
</div>

<div class="tasks-content">

    <div class="task-panel" id="1">
        <a href="#task1">
            <div class="task-title">
                404_task_not_found
            </div>
            <div class="task-body">
                <p class="price">300</p>
                <p>Решили: 2</p>
            </div>
            <div class="task-title">
                <p class="category">Web</p>
            </div>
        </a>
    </div>


    <div class="task-panel  complete" id="2">
        <a href="#task2">
            <div class="task-title">
                Kenobium
            </div>
            <div class="task-body">
                <p class="price">200</p>
                <p>Решили: 5</p>
            </div>
            <div class="task-title">
                <p class="category">Web</p>
            </div>
        </a>
    </div>


    <div class="task-panel" id="3">
        <a href="#task1">
            <div class="task-title">
                Config Viewer
            </div>
            <div class="task-body">
                <p class="price">100</p>
                <p>Решили: 1</p>
            </div>
            <div class="task-title">
                <p class="category">Web</p>
            </div>
        </a>
    </div>


    <div class="task-panel complete" id="4">
        <a href="#task1">
            <div class="task-title">
                Hatters gonna hate
            </div>
            <div class="task-body">
                <p class="price">300</p>
                <p>Решили: 0</p>
            </div>
            <div class="task-title">
                <p class="category">PPC</p>
            </div>
        </a>
    </div>


    <div class="task-panel" id="5">
        <a href="#task1">
            <div class="task-title">
                Very long password!
            </div>
            <div class="task-body">
                <p class="price">50</p>
                <p>Решили: 7</p>
            </div>
            <div class="task-title">
                <p class="category">PPC</p>
            </div>
        </a>
    </div>


    <div class="task-panel complete" id="6">
        <a href="#task1">
            <div class="task-title">
                Autosum
            </div>
            <div class="task-body">
                <p class="price">400</p>
                <p>Решили: 4</p>
            </div>
            <div class="task-title">
                <p class="category">PPC</p>
            </div>
        </a>
    </div>


    <div class="task-panel" id="7">
        <a href="#task1">
            <div class="task-title">
                Seryosly?
            </div>
            <div class="task-body">
                <p class="price">100</p>
                <p>Решили: 7</p>
            </div>
            <div class="task-title">
                <p class="category">Crypto</p>
            </div>
        </a>
    </div>


    <div class="task-panel complete" id="8">
        <a href="#task1">
            <div class="task-title">
                Ключ может быть только лишь слово
            </div>
            <div class="task-body">
                <p class="price">35</p>
                <p>Решили: 4</p>
            </div>
            <div class="task-title">
                <p class="category">Crypto</p>
            </div>
        </a>
    </div>


    <div class="task-panel" id="9">
        <a href="#task1">
            <div class="task-title">
                Авгиевы конюшни
            </div>
            <div class="task-body">
                <p class="price">400</p>
                <p>Решили: 1</p>
            </div>
            <div class="task-title">
                <p class="category">Forensic</p>
            </div>
        </a>
    </div>


    <div class="task-panel complete" id="10">
        <a href="#task1">
            <div class="task-title">
                Classic
            </div>
            <div class="task-body">
                <p class="price">100</p>
                <p>Решили: 3</p>
            </div>
            <div class="task-title">
                <p class="category">Forensic</p>
            </div>
        </a>
    </div>


    <div class="task-panel" id="11">
        <a href="#task1">
            <div class="task-title">
                Trial
            </div>
            <div class="task-body">
                <p class="price">200</p>
                <p>Решили: 10</p>
            </div>
            <div class="task-title">
                <p class="category">Reverse</p>
            </div>
        </a>
    </div>


    <div class="task-panel complete" id="12">
        <a href="#task1">
            <div class="task-title">
                Enter
            </div>
            <div class="task-body">
                <p class="price">500</p>
                <p>Решили: 0</p>
            </div>
            <div class="task-title">
                <p class="category">Reverse</p>
            </div>
        </a>
    </div>


</div>
<div style="clear: both"></div>

<div id="task1" class="modalDialog">
    <div class="modal">
        <a href="#close" title="Закрыть" class="close">X</a>
        <h2 class="modal-title">404_task_not_found</h2>
        <div class="modal-content">
            <p class="task-category"> Web </p>
            <p class="price">300</p>

            <p> Решили: 3 </p>

            <div class="modal-description">
                Как же перейти на нужную страницу…
                <br>
                <a href="#"> Ссылка </a>
            </div>
            <p class="error"> Неверный флаг </p>
        </div>
        <div class="modal-footer">
            <form method="post">
                <input type="text" placeholder="school{}">
                <input type="submit" value="Сдать">
            </form>
        </div>
    </div>
</div>

<div id="task2" class="modalDialog">
    <div class="modal complete">
        <a href="#close" title="Закрыть" class="close">X</a>
        <h2 class="modal-title">Kenobium</h2>
        <div class="modal-content">
            <p class="task-category"> Web </p>
            <p class="price">200</p>

            <p> Решили: 5 </p>

            <div class="modal-description">
                Ходят легенды о древнем и скрытом браузере Kenobium. Некоторые сайты до сих пор поддерживают только
                его, он считается родителем onion сетей… Мы нашли такой сайт, но не можем придумать что делать
                дальше. Помоги нам.
                <br>
                <a href="#">Тот самый сайт</a>
            </div>
            <p class="error" style="opacity: 0"> Неверный флаг </p>
        </div>
        <div class="modal-footer">
            <p> Задание уже решено вашей командой </p>
        </div>
    </div>
</div>
<script>
    function view(cat = "all") {
        var panels = document.getElementsByClassName("task-panel");
        var sidelines = document.getElementsByClassName("sideline");
        for(i=0;i<sidelines.length;i++)
        {
            sidelines[i].style.backgroundColor = "";
            sidelines[i].style.color = "";
        }
        if (cat !== "all") {

            var categories = document.getElementsByClassName("category");
            for (i = 0; i < panels.length; i++) {
                if (categories[i].innerText !== cat) panels[i].style.display = "none";
                else panels[i].style.display = "block";

            }
        }
        else {
            for (i = 0; i < panels.length; i++) {
                panels[i].style.display = "block";
            }
        }
        document.getElementById(cat).style.backgroundColor = "#0295ff";
        document.getElementById(cat).style.color = "white";
    }
</script>
