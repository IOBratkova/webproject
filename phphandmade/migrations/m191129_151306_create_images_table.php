<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m191129_151306_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string(128)->comment('Краткое описанние'),
            'lessonID' => $this->integer()->notNull()->comment('ID урока'),
            'path' => $this->string(128)->notNull()->comment('Путь к изображению')
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        // creates index for column `author_id`
        $this->createIndex(
            'idlesson',
            'images',
            'lessonID'
        );

        $this->addForeignKey('lessonimageFK',
            'images',
            'lessonID',
            'photolessons',
            'id',
            'CASCADE',
            'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images}}');
    }
}
