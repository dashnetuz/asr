<?php
use yii\db\Migration;

class m240422_000002_create_user_profile_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'avatar' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-user_profile-user_id',
            '{{%user_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-user_profile-user_id', '{{%user_profile}}');
        $this->dropTable('{{%user_profile}}');
    }
}
