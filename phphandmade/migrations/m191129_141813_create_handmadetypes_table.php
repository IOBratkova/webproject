<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%handmadetypes}}`.
 */
class m191129_141813_create_handmadetypes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%handmadetypes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->comment('Заголовок')
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%handmadetypes}}');
    }
}
