<?php

use yii\db\Migration;

/**
 * Class m180415_015108_AddRoles
 */
class m180415_015108_AddRoles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rbac = \Yii::$app->authManager;
        $guest = $rbac->createRole('guest');
        $guest->description = 'Посетитель';
        $rbac->add($guest);
        $student = $rbac->createRole('user');
        $student->description = 'Участник';
        $rbac->add($student);
        $admin = $rbac->createRole('admin');
        $admin->description = 'Администратор';
        $rbac->add($admin);
        $rbac->addChild($admin, $student);
        $rbac->addChild($student, $guest);
        $rbac->assign(
            $admin,
            \app\models\User::findOne([
                'login' => 'admin'])->id
        );
    }
    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $manager = \Yii::$app->authManager;
        $manager->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180415_015108_AddRoles cannot be reverted.\n";

        return false;
    }
    */
}
