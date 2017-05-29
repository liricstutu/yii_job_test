<?php

use yii\db\Migration;
use yii\db\Schema;

class m170523_122546_create_table_tasks extends Migration
{
    public function up()
    {
        {
            $this->createTable(
                'tasks',
                [
                    'id'       => Schema::TYPE_PK,
                    'datetime' => Schema::TYPE_TEXT.' NOT NULL',
                    'text'     => Schema::TYPE_TEXT.' NOT NULL',
                ]
            );
        }
    }

    public function down()
    {
        $this->dropTable('tasks');
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
