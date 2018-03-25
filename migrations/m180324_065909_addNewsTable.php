<?php

use yii\db\Migration;

/**
 * Class m180324_065909_addNewsTable
 */
class m180324_065909_addNewsTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'image'=>$this->string(255),
            'title'=>$this->string(255),
            'text'=>$this->text()
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180324_065909_addNewsTable cannot be reverted.\n";

        return false;
    }
    */
}
