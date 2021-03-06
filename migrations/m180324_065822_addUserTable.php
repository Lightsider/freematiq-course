<?php

use yii\db\Migration;

/**
 * Class m180324_065822_addUserTable
 */
class m180324_065822_addUserTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'login' => $this->string(255)->notNull()->unique(),
            'password_hash' => $this->string(60)->notNull(),
            'status' => "ENUM('admin', 'user')",
            'score'=> $this->integer()->defaultValue(0),
            'image'=>$this->string(255),
            'name'=>$this->string(255)->notNull(),
            'school'=>$this->string(255)->notNull(),
            'city'=>$this->string(255)->notNull(),
        ]);

        $this->insert('user',
          [
              'login'=>"admin",
              'password_hash'=>\Yii::$app->security->generatePasswordHash("admin"),
              'status' => "admin",
              'score'=> 0,
              'image'=>"",
              'name'=>"admin",
              'school'=>"admin",
              'city'=>"admin",
          ]
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180324_065822_addUserTable cannot be reverted.\n";

        return false;
    }
    */
}
