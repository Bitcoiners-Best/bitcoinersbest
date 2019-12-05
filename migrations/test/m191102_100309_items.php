<?php

use yii\db\Migration;

/**
 * Class m191102_100309_items
 */
class m191102_100309_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();
        foreach (\app\models\ResType::find()->all() as $rt) {
            for ($x=0;$x<10;$x++) {
                $array = [];
                $array = [
                    'res_type_id'   =>  $rt->id,
                    'title'         =>  $faker->text(50),
                    'description'   =>  $faker->text,
                    'image'         =>  $faker->imageUrl,
                    'rss'           =>  '',
                    'url'           =>  $faker->url,
                    'vote_count'    =>  rand(0,1000),
                    'status_type_id'=>  (rand(0,1)?50:55),
                    'data'          =>  '',
                    'created_at'    =>  time(),
                    'created_by'    =>  '@'.$faker->firstName,
                    'submitted_by'  =>  69,

                ];
                $this->insert('res_item',$array);
            }
        }

        $faker = Faker\Factory::create();
        foreach (\app\models\ResItem::find()->all() as $rt) {
            for ($x=0;$x<10;$x++) {
                $array = [];
                $array = [
                    'res_item_id'   =>  $rt->id,
                    'count'         =>  rand(0,20),
                    'status_type_id'   =>  \app\models\StatusType::RESVOTE_COUNTED,
                    'transaction_id'         =>  NULL,
                    'created_at'           =>  time(),
                    'user_id'           =>  $rt->submitted_by

                ];
                $this->insert('res_vote',$array);
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DELETE FROM res_item");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191102_100309_items cannot be reverted.\n";

        return false;
    }
    */
}
