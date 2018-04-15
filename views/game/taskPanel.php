<?php

use app\models\OneTask;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$model = new OneTask($task);

?>

<?php

$form = ActiveForm::begin([
        'id' => '',
        'fieldConfig' => [
            'template' => "{input}\n",
            'labelOptions' => ['class' => '']
        ],
        'action' => ['/solve'],
        'options' => ['method' => 'post'],

    ]
); ?>

<?= $form->field($model, 'flag')->textInput(['maxlength' => 255,'placeholder'=>"School{}",'class'=>""]) ?>
<?= $form->field($model, 'task_id')->hiddenInput() ?>

<?= Html::submitButton('Сдать', ['class' => '']) ?>


<?php ActiveForm::end(); ?>

