<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m191129_143228_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->comment('Имя'),
            'lastName' =>$this->string(128)->notNull()->comment('Фамилия'),
            'login' => $this->string(128)->notNull()->comment('Логин'),
            'email' => $this->string(128)->notNull()->comment('Email'),
            'password' =>$this->string(128)->notNull()->comment('Пароль'),
            'authKey' => $this->string(128)->notNull()->comment('Ключ авторизации'),
            'createAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'accessToken' => $this->string()->notNull()->comment('Токен'),
            'updateAt' => $this->dateTime()->comment('Дата изменения'),
            'role' => $this->string(128)->notNull()->comment('Роль пользователя')

        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
