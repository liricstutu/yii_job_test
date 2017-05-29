<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$script
    = <<< JS
$("document").ready(function(){
        $("#new_task").on("pjax:end", function() {
            $.pjax.reload({container:"#tasks"});  //Reload GridView
        });
});
JS;
$this->registerJs($script);
?>

<div class="form-inline task-form">

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '1']]); ?>

    <?php echo $form->field($model, 'text')->label(false) ?>
    <?php echo $form->field($model, 'datetime')->label(false) ?>
    <!--    --><?php //echo $form->field(
    //        $model,
    //        'datetime',
    //        [
    //            'template' => '
    //<div class="form-group">
    //        <div class="input-group date"> {input}
    //        <span class="input-group-addon" style="">
    //							<span class="glyphicon glyphicon-calendar"></span>
    //						</span>
    //        </div>
    //    </div>
    //       {error}{hint}
    //   </div>',
    //        ]
    //    )->textInput() ?>

    <div class="form-group" style="margin-bottom: 10px">
        <?= Html::submitButton(
            $model->isNewRecord
                ? Yii::t('app', 'Добавить')
                : Yii::t(
                'app',
                'Обновить'
            ),
            [
                'class' => $model->isNewRecord ? 'btn btn-success'
                    : 'btn btn-primary',
            ]
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
