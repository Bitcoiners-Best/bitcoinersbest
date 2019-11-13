<?php

use yii\db\Migration;

/**
 * Class m191113_214229_resvote_created_at
 */
class m191113_214229_resvote_created_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `res_vote` ADD COLUMN `created_at` INT(11)");
        $this->execute("ALTER TABLE `res_vote` ADD COLUMN `user_id` INT(11)");
        $this->addForeignKey('res_vote_ibfk_4', 'res_vote', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("ALTER TABLE `res_vote` DROP `created_at`");
        $this->execute("ALTER TABLE `res_vote` DROP `user_id`");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191113_214229_resvote_created_at cannot be reverted.\n";

        return false;
    }
    */
}
