<?php

use yii\db\Migration;

/**
 * Class m180324_065923_addTaskLogTable
 */
class m180324_065923_addTaskLogTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {
        $this->createTable('{{%taskLog}}',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_category'=> $this->integer(),
            'id_task'=> $this->integer(),
            'time'=>$this->date(),
            'flag'=>$this->string(255),
            'result'=>"ENUM('false', 'true')"
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    /*public function safeDown()
    {
        $this->dropTable('{{%taskLog}}');

        return true;
    }

    */
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('taskLog',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_user'=> $this->integer(),
            'id_task'=> $this->integer(),
            'time'=>$this->timestamp(),
            'flag'=>$this->string(255),
            'result'=>"ENUM('false', 'true')"
        ]);

        $this->addForeignKey("id_log_user","taskLog","id_user","user","id"
        ,"CASCADE","CASCADE");
        $this->addForeignKey("id_log_task","taskLog","id_task","tasks","id"
        ,"CASCADE","CASCADE");

        return true;
    }

    public function down()
    {
        $this->dropForeignKey("id_log_task","taskLog");
        $this->dropForeignKey("id_log_user","taskLog");

        $this->dropTable('taskLog');

        return true;
    }

}
