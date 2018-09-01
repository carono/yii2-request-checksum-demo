<?php

use yii\db\Migration;

/**
 * Class m180709_093737_init
 */
class m180709_093737_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status_id' => $this->integer(),
            'comment' => $this->text(),
            'cost' => $this->integer(),
            'is_paid' => $this->boolean()->notNull()->defaultValue(false)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180709_093737_init cannot be reverted.\n";

        return false;
    }
    */
}
