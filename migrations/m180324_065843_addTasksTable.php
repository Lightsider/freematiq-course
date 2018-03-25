<?php

use yii\db\Migration;

/**
 * Class m180324_065843_addTasksTable
 */
class m180324_065843_addTasksTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {
        $this->createTable('{{%tasks}}',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_category'=> $this->tinyInteger(),
            'flag' => $this->string(255)->notNull()->unique(),
            'score'=> $this->integer(),
            'title'=>$this->string(255),
            'description'=>$this->text()
        ]);

        return true;
    }*/

    /**
     * {@inheritdoc}
     */
    /*public function safeDown()
    {
        $this->dropTable('{{%tasks}}');

        return true;
    }*/


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('tasks',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_category'=> $this->tinyInteger(),
            'flag' => $this->string(255)->notNull()->unique(),
            'score'=> $this->integer(),
            'title'=>$this->string(255),
            'description'=>$this->text()
        ]);

       /* $this->addForeignKey("id_tasks_category","tasks","id_category","category",
            "id","CASCADE","CASCADE");*/


        return true;
    }

    public function down()
    {
       /* $this->dropForeignKey("id_tasks_category","tasks");*/

        $this->dropTable('tasks');

        return true;
    }

}
