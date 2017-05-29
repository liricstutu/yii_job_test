<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="tasks-index">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label style="display:block;">Задание</label>
            <?php Pjax::begin(
                ['id' => 'new_task', 'enablePushState' => false]
            ); ?>
            <?= $this->render('_form', ['model' => $model]) ?>
            <?php Pjax::end(); ?>
        </div>
        <?php
        Pjax::begin(['id' => 'tasks']);
        echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'columns'      => [
                    [
                        'class'  => 'yii\grid\DataColumn',
                        'value'  => function ($data) {
                            return
                                '<h4 class="list-group-item-heading item-date">'
                                .$data->datetime
                                .'</h4><div class="list-group-item-text item-task">'
                                .$data->text
                                .'</div>';
                        },
                        'format' => 'html',
                    ],
                    [
                        'class'    => 'yii\grid\ActionColumn',
                        'buttons'  => [
                            'update' => function ($url, $model) {
                                $customurl = Yii::$app->getUrlManager()
                                    ->createUrl(
                                        ['tasks/update', 'id' => $model['id']]
                                    );
                                return \yii\helpers\Html::a(
                                    '<span class="glyphicon glyphicon-edit"></span>',
                                    $customurl,
                                    [
                                        'title'     => Yii::t(
                                            'yii',
                                            'Обновить'
                                        ),
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                            'delete' => function ($url, $model) {
                                $customurl = Yii::$app->getUrlManager()
                                    ->createUrl(
                                        ['tasks/delete', 'id' => $model['id']]
                                    ); //$model->id для AR
                                return \yii\helpers\Html::a(
                                    '<span class="glyphicon glyphicon-trash"></span>',
                                    $customurl,
                                    [
                                        'title'        => Yii::t(
                                            'yii',
                                            'Удалить'
                                        ),
                                        'data-confirm' => Yii::t(
                                            'yii',
                                            'Вы действительно хотите удалить эту запись?'
                                        ),
                                        'data-method'  => 'post',
                                        'data-pjax'    => '1',
                                    ]
                                );
                            },
                        ],
                        'template' => '{update}{delete}',
                        'options'  => ['class' => 'actions'],
                    ],
                ],
                'showOnEmpty'  => 'Нет добавленных задач',
                'layout'       => '{items}',
                'showHeader'   => false,
                'options'      => [
                    'class' => "col-md-6 col-md-offset-3 list-group",
                    'style' => "margin-top:30px;",
                ],
            ]
        );
        Pjax::end(); ?>
    </div>
</div>
