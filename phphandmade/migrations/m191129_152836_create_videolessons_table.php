<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videolessons}}`.
 */
class m191129_152836_create_videolessons_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videolessons}}', [
            'id' => $this->primaryKey(),
            'title' =>$this->string(128)->notNull()->comment('Название урока'),
            'description'=>$this->string(128)->notNull()->comment('Описание'),
            'materials'=>$this->text()->notNull()->comment('Материалы'),
            'createAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updateAt' => $this->dateTime()->comment('Дата изменения'),
            'link' => $this->string(255)->notNull()->comment('Ссылка на видео'),
            'userID' => $this->integer()->notNull()->comment('ID пользователя'),
            'handmadeTypeID' => $this->integer()->notNull()->comment('ID вида рукоделия')
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex(
            'iduser',
            'videolessons',
            'userID'
        );

        $this->addForeignKey('uservideolessFK',
            'videolessons',
            'userID',
            'users',
            'id',
            'CASCADE',
            'CASCADE');


        $this->createIndex(
            'idhmt',
            'videolessons',
            'handmadeTypeID'
        );

        $this->addForeignKey('handmadetypevideolessFK',
            'videolessons',
            'handmadeTypeID',
            'handmadetypes',
            'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videolessons}}');
    }
}
