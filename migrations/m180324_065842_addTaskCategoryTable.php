<?php

use yii\db\Migration;

/**
 * Class m180324_065842_addTaskCategoryTable
 */
class m180324_065842_addTaskCategoryTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'title'=>$this->string(255)
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180324_065942_addTaskCategoryTable cannot be reverted.\n";

        return false;
    }
    */
}
