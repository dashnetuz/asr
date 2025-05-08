<?php
use yii\db\Migration;

class m240422_000003_create_social_account_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%social_account}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'provider' => $this->string()->notNull(),
            'client_id' => $this->string()->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-social_account-user_id',
            '{{%social_account}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-social_account-user_id', '{{%social_account}}');
        $this->dropTable('{{%social_account}}');
    }
}
