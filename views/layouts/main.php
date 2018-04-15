<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);


//$this->title=Yii::$app->params['name'];


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
        <link rel="shortcut icon" href="img/logoWhite.png" type="image/x-icon">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header>
        <nav>
            <?= Html::a('<div class="text-logo">
                    <p>SchoolCTF</p>
                </div>', ['site/index']) ?>
            <div class="container">
                <ul>
                    <li class="purple" name="index"><?= Html::a('Главная', ['site/index']) ?></li>
                    <li class="purple" name="gallery">
                        <?= Html::a('Галерея', ['site/gallery']) ?></li>
                    <li class="purple" name="particip">
                        <?= Html::a('Участники', ['site/particip']) ?></li>
                    <li class="purple" name="org">
                        <?= Html::a('Организаторы', ['site/org']) ?></li>
                    <li class="purple" name="contact"><?= Html::a('Контакты', ['site/contact']) ?></li>
                    <li class="primary"><?= Html::a('К соревнованиям', ['game/tasks']) ?></li>
                </ul>
            </div>
        </nav>
    </header>
    <script type="text/javascript">
        var v=document.getElementsByClassName('purple');
        var adr=document.baseURI.split("/");

        for(i=0;i<v.length;i++){
            if (adr[adr.length-1] === v[i].getAttribute('name'))
                v[i].className="purple active";
        }
    </script>

    <div class="image-container">
        <div class="image-logo">
            <img src="/img/logoWhite.png"/>
        </div>
    </div>
    <div class="content-back">
        <div class="content">
            <?= $content ?>


        </div>
    </div>
    <footer>
        <?= Html::a('<div class="text-logo">
                    <p>SchoolCTF</p>
                </div>', ['site/index']) ?>
        <div class="social_icons">
            <p>Будь с нами</p>
            <ul>
                <li><a href="#"> <img src="/img/telegram.png"/></a></li>
                <li><a href="#"> <img src="/img/vk.png"/></a></li>
            </ul>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>
<?php if (1 == 0) { ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>