<?php

/* @var $this yii\web\View */
/* @var $completeAllTeamsTasks */
/* @var $completeTasks array */
/* @var $categories \app\models\Category[]|array */

/* @var $tasks \app\models\Tasks[]|array */

/* @var $messages \app\models\Messages[]|array */

use app\models\OneTask;
use yii\helpers\Html;

$this->title = 'Задания';
?>
<div class="sidebar">
    <div class="">
        <h2> Категории: </h2>
        <ul>
            <?php foreach ($categories as $i => $category): ?>

                <?php if ($i === 0): ?>
                    <li class="sideline" id="all" onclick="view('<?= Html::encode($category->title) ?>')" style="background-color: rgb(2, 149, 255); color: white;">
                <?php else: ?>
                    <li class="sideline" id="<?= Html::encode($category->title) ?>" onclick="view('<?= Html::encode($category->title) ?>')">
                <?php endif; ?>
                <?= Html::encode($category->title) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <hr>
    <h2 style="margin-bottom: 10px">Информация:</h2>
    <div class="info-block-main">
        <?php foreach ($messages as $message): ?>
            <div class="info-block">
                <div class="info-block-title"><p><?php echo Html::encode($message->title) ?></p>
                    <p><?php
                        $date = new DateTime($message->time, new \DateTimeZone("Asia/Barnaul"));
                        echo Html::encode($date->format("H:i")) ?></p>
                </div>
                <p class="info-block-content"><?php echo $message->description ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="tasks-content">
    <?php foreach ($tasks

                   as $i => $task): ?>
<?php if (in_array($task->id, $completeTasks)): ?>
    <div class="task-panel complete" id="<?= Html::encode($task->id) ?>">
        <?php else: ?>
        <div class="task-panel" id="<?= Html::encode($task->id) ?>">
            <?php endif; ?>
            <a href="#task<?= Html::encode($task->id) ?>">
                <div class="task-title">
                    <?= Html::encode($task->title) ?>
                </div>
                <div class="task-body">
                    <p class="price"><?= Html::encode($task->score) ?></p>
                    <p>Решили: <?php echo Html::encode($completeAllTeamsTasks[$task->id]) ?></p>
                </div>
                <div class="task-title">
                    <p class="category"><?php
                        foreach ($categories as $i => $category)
                            if ($category->id == $task->id_category)
                                echo Html::encode($category->title);
                        ?></p>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>


    <div style="clear: both"></div>


    <?php foreach ($tasks

    as $i => $task): ?>
    <div id="task<?= $task->id ?>" class="modalDialog">
        <?php if (in_array($task->id, $completeTasks)): ?>
        <div class="modal complete">
            <?php else: ?>
            <div class="modal">
                <?php endif; ?>
                <a href="#close" title="Закрыть" class="close">X</a>
                <h2 class="modal-title"><?= $task->title ?></h2>
                <div class="modal-content">
                    <p class="task-category"> <?php
                        foreach ($categories as $i => $category)
                            if ($category->id == $task->id_category)
                                echo Html::encode($category->title);
                        ?> </p>
                    <p class="price"><?= Html::encode($task->score) ?></p>

                    <p> Решили: <?php echo Html::encode($completeAllTeamsTasks[$task->id]) ?> </p>

                    <div class="modal-description">
                        <?= $task->description ?>
                    </div>

                        <p class="error" style="display: none"> </p>

                </div>
                <div class="modal-footer">
                    <?php if (in_array($task->id, $completeTasks)): ?>
                        <p> Задание уже решено вашей командой </p>
                    <?php else: ?>
                        <?php
                        echo $this->render('taskPanel', [
                            'task' => $task,
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <script>
            function view(cat = "all") {
                var panels = document.getElementsByClassName("task-panel");
                var sidelines = document.getElementsByClassName("sideline");
                for (i = 0; i < sidelines.length; i++) {
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
        <script>

            $('form').submit( function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                $.ajax({
                    url: '/solve',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(res){
                        var taskId = "task" + res['id_task'];
                        if(res['message']!=="Вы правильно решили задание") {
                            $("#" + taskId).find(".error").css("display", "block");
                            $("#" + taskId).find(".error").text(res['message']);
                        }
                        else
                        {
                            var id = res['id_task'];
                            $("#" + id).addClass("complete");
                            console.log($("#" + id).html());
                            $("#" + taskId).find(".modal").addClass("complete");
                            $("#" + taskId).find(".modal-footer").html("<p> Задание уже решено вашей командой </p>");
                            $("#" + taskId).find(".error").text(res['message']);
                            $("#" + taskId).find(".error").css("display", "block");

                            //Исправление счета

                            $("#score").text(res['score'] + " pts");

                        }
                    },
                    error: function(){
                        alert('Что-то пошло не так. Попробуйте позже');
                    }
                });
                return false;
            });

        </script>

