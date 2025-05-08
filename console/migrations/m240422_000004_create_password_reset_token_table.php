<?php
use yii\db\Migration;

class m240422_000004_create_password_reset_token_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%password_reset_token}}', [
            'user_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-password_reset_token',
            '{{%password_reset_token}}',
            ['user_id', 'token']
        );

        $this->addForeignKey(
            'fk-password_reset_token-user_id',
            '{{%password_reset_token}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-password_reset_token-user_id', '{{%password_reset_token}}');
        $this->dropPrimaryKey('pk-password_reset_token', '{{%password_reset_token}}');
        $this->dropTable('{{%password_reset_token}}');
    }
}
