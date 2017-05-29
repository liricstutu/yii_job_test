<?php

use yii\db\Migration;

class m170528_090212_add_data_to_table_tasks extends Migration
{
    public function up()
    {
        $this->insert(
            'tasks',
            [
                'datetime' => '18.05.2017 15:30',
//                'datetime' => '2017-05-18 15:30',
                'text'     => 'Выпить стакан воды',
            ]
        );
        $this->insert(
            'tasks',
            [
                'datetime' => '18.05.2017 16:30',
//                'datetime' => '2017-05-18 16:30',
                'text'     => 'Доказать теорему Ферма',
            ]
        );
        $this->insert(
            'tasks',
            [
                'datetime' => '18.05.2017 19:30',
//                'datetime' => '2017-05-18 19:30',
                'text'     => 'Посмотреть любимый сериал',
            ]
        );
    }

    public function down()
    {
        $this->delete('tasks');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
