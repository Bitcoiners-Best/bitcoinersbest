<?php

use yii\db\Migration;

/**
 * Class m191107_093010_oauth
 */
class m191107_093010_oauth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-auth-user_id-user-id', 'auth', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->execute("ALTER TABLE `user` ADD COLUMN `twitter` VARCHAR(255) AFTER `username`;");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth');
        $this->execute("ALTER TABLE `user` DROP COLUMN `twitter`");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191107_093010_oauth cannot be reverted.\n";

        return false;
    }
    */
}
