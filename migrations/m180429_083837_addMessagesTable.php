<?php

use yii\db\Migration;

/**
 * Class m180429_083837_addMessagesTable
 */
class m180429_083837_addMessagesTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'time'=>$this->time()->notNull(),
            'title'=>$this->string(255)->notNull(),
            'description'=>$this->text()
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('messages');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180429_083837_addMessagesTable cannot be reverted.\n";

        return false;
    }
    */
}
