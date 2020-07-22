<?php

use yii\db\Migration;

/**
 * Class m200706_180734_adminUser
 */
class m200706_180734_adminUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $ownerRole = $auth->getRole('owner');
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, 1);
        $auth->assign($ownerRole, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_180734_adminUser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_180734_adminUser cannot be reverted.\n";

        return false;
    }
    */
}
