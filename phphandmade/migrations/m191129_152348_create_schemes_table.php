<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schemes}}`.
 */
class m191129_152348_create_schemes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schemes}}', [
            'id' => $this->primaryKey(),
            'title' =>$this->string(128)->notNull()->comment('Название cхемы'),
            'description'=>$this->string(128)->notNull()->comment('Описание'),
            'path' => $this->string(128)->notNull()->comment('Путь к изображению схемы'),
            'createAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updateAt' => $this->dateTime()->comment('Дата изменения'),
            'userID' => $this->integer()->notNull()->comment('ID пользователя'),
            'handmadeTypeID' => $this->integer()->notNull()->comment('ID вида рукоделия')
        ]);

        $this->createIndex(
            'iduser',
            'schemes',
            'userID'
        );

        $this->addForeignKey('userschemeFK',
            'schemes',
            'userID',
            'users',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createIndex(
            'idhmt',
            'schemes',
            'handmadeTypeID'
        );

        $this->addForeignKey('handmadetypeschemeFK',
            'schemes',
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
        $this->dropTable('{{%schemes}}');
    }
}
