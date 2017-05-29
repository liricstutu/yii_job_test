<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string  $datetime
 * @property string  $text
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tasks';
    }

    public function init()
    {
        $this->text = 'Выпить стакан воды';
        $this->datetime = '18.05.2017 15:30';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['datetime', 'text'],
                'required',
                'message' => 'Не может быть пустым',
            ],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'ID',
            'datetime' => 'Datetime',
            'text'     => 'Text',
        ];
    }
}
