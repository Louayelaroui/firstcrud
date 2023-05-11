<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%backenduser}}`.
 */
class m230511_000030_create_backenduser_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%backenduser}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'username' => $this->string(),
            'password' => $this->string(),
            'authkey' => $this->string (),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%backenduser}}');
    }
}
