<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photolessons}}`.
 */
class m191129_145441_create_photolessons_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photolessons}}', [
            'id' => $this->primaryKey(),
            'title' =>$this->string(128)->notNull()->comment('Название урока'),
            'description'=>$this->string(128)->notNull()->comment('Описание'),
            'materials'=>$this->text()->notNull()->comment('Материалы'),
            'countImages' =>$this->integer()->notNull()->comment('Количество изображений'),
            'createAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updateAt' => $this->dateTime()->comment('Дата изменения'),
            'userID' => $this->integer()->notNull()->comment('ID пользователя'),
            'handmadeTypeID' => $this->integer()->notNull()->comment('ID вида рукоделия')
        ]);

        $this->createIndex(
            'iduser',
            'photolessons',
            'userID'
        );

        $this->addForeignKey('userFKphotoless',
            'photolessons',
            'userID',
            'users',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createIndex(
            'idhmt',
            'photolessons',
            'handmadeTypeID'
        );

        $this->addForeignKey('handmadetypeFK',
            'photolessons',
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
        $this->dropTable('{{%photolessons}}');
    }
}
