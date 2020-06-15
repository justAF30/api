<?php

use yii\db\Migration;

/**
 * Class m200610_083110_create_table_country
 */
class m200610_083110_create_table_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('country', [
           'id' => $this->primaryKey(),
           'code' => $this->char('3')->notNull()->unique(),
           'name' => $this->string('64')->notNull(),
           'population' => $this->integer()->notNull()->defaultValue(0),
           'status' => $this->tinyInteger(1)->notNull()->defaultValue(1)

       ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200610_083110_create_table_country cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200610_083110_create_table_country cannot be reverted.\n";

        return false;
    }
    */
}
