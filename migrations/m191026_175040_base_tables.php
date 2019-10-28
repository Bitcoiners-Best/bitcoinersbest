<?php

use yii\db\Migration;

/**
 * Class m191026_175040_base_tables
 */
class m191026_175040_base_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
                CREATE TABLE `res_item` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `res_type_id` int,
                  `title` varchar(255),
                  `description` varchar(255),
                  `image` varchar(255),
                  `rss` varchar(255),
                  `url` varchar(255),
                  `vote_count` int,
                  `status_type_id` int,
                  `data` longtext,
                  `created_at` varchar(255),
                  `created_by` varchar(255),
                  `submitted_by` int
                );
                
                CREATE TABLE `res_type` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `name` varchar(255),
                  `display_name` varchar(255)
                );
                
                CREATE TABLE `status_type` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `name` varchar(255),
                  `display_name` varchar(255)
                );
                
                CREATE TABLE `res_vote` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `res_item_id` int,
                  `count` int,
                  `status_type_id` int,
                  `transaction_id` int
                );
                
                CREATE TABLE `projects` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `name` varchar(255),
                  `url` varchar(255),
                  `twitter_id` varchar(255),
                  `submitted_by` int
                );
                
                CREATE TABLE `transactions` (
                  `id` int PRIMARY KEY AUTO_INCREMENT,
                  `tx_id` varchar(255),
                  `payment_request` varchar(255),
                  `memo` varchar(255),
                  `settled` boolean,
                  `submitted_by` int
                );
                
                ALTER TABLE `res_item` ADD FOREIGN KEY (`res_type_id`) REFERENCES `res_type` (`id`);
                
                ALTER TABLE `res_item` ADD FOREIGN KEY (`status_type_id`) REFERENCES `status_type` (`id`);
                
                ALTER TABLE `res_item` ADD FOREIGN KEY (`submitted_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
                
                ALTER TABLE `res_vote` ADD FOREIGN KEY (`res_item_id`) REFERENCES `res_item` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
                
                ALTER TABLE `res_vote` ADD FOREIGN KEY (`status_type_id`) REFERENCES `status_type` (`id`);
                
                ALTER TABLE `res_vote` ADD FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);
                
                ALTER TABLE `projects` ADD FOREIGN KEY (`submitted_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
                
                ALTER TABLE `transactions` ADD FOREIGN KEY (`submitted_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
                ");

        $this->execute("INSERT INTO `res_type` (`id`, `name`, `display_name`)
                        VALUES
                            (20, 'podcast', 'Podcast'),
                            (25, 'podcast_episode', 'Episode'),
                            (30, 'article', 'Article'),
                            (35, 'book', 'Book'),
                            (40, 'twitter_thread', 'Twitter Thread');
                        ");

        $this->execute("INSERT INTO `status_type` (`id`, `name`, `display_name`)
                        VALUES
                            (50, 'resItem_active', 'Item Active'),
                            (55, 'resItem_hidden', 'Item Hidden'),
                            (70, 'resVote_counted', 'Vote Counted'),
                            (75, 'resVote_pending', 'Vote Pending');
                        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE `res_vote`");
        $this->execute("DROP TABLE `transactions`");
        $this->execute("DROP TABLE `res_item`");
        $this->execute("DROP TABLE `res_type`");

        $this->execute("DROP TABLE `status_type`");
        $this->execute("DROP TABLE `projects`");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191026_175040_base_tables cannot be reverted.\n";

        return false;
    }
    */
}
