<?php

use yii\db\Migration;

class m170423_161901_customer_table extends Migration
{
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        echo "m170423_161901_customer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
