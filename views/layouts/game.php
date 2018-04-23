<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\GameAsset;
use app\models\User;

GameAsset::register($this);


if (!Yii::$app->user->isGuest) {
    $user = \app\models\User::findIdentity(Yii::$app->user->id);
}
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/img/logoWhite.png" type="image/x-icon">
</head>
<body>
<header>
    <nav>
        <?= Html::a('<div class="text-logo">
                    <p>SchoolCTF</p>
                </div>', ['game/tasks']) ?>
        <div class="container">
            <ul>
                <li class="primary" name="tasks"><?= Html::a('Задания', ['game/tasks']) ?></li>
                <li class="primary" name="result"><?= Html::a('Результаты', ['game/result']) ?></li>
                <?php if (User::isAdmin()): ?>
                <li class="white"><?= Html::a('К администрированию', ['admin/tasks']) ?></li>
                <?php endif; ?>
                <li class="purple"><?= Html::a('К информации', ['site/index']) ?></li>
            </ul>
        </div>
        <script type="text/javascript">
            var v = document.getElementsByClassName('primary');
            var adr = document.baseURI.split("/");

            for (i = 0; i < v.length; i++) {
                if (adr[4] === v[i].getAttribute('name'))
                    v[i].className = "primary active";
            }
        </script>

        <div class="profile">
            <?php if (Yii::$app->user->isGuest) {
                echo Html::a('<p style=\'text-align: center;padding-top: 10px;padding-bottom: 10px;\'>Вход</p>', ['game/login']);
            } else {


                echo Html::a("<div class=\"profile-logo\" style=\"background-image: url('" . $user->image . "')\"></div>
            <div class=\"credits\">
                <p><b>" . $user->name . "</b></p>
                <p>" . $user->score . " pts</p>
            </div>",['game/login']);
            }
            ?>
        </div>
    </nav>
</header>
<div class="content-back">
    <div class="content">

        <?= $content ?>

    </div>
</div>
<footer>
    <?= Html::a('<div class="text-logo">
                    <p>SchoolCTF</p>
                </div>', ['game/tasks']) ?>
    <div class="social_icons">
        <p>Будь с нами</p>
        <ul>
            <li><a href="#"> <img src="/img/game/telegram.png"/></a></li>
            <li><a href="#"> <img src="/img/game/vk.png"/></a></li>
        </ul>
        <div style="clear: both"></div>
    </div>
</footer>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
