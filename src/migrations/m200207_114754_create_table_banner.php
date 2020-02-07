<?php

use yii\db\Migration;

class m200207_114754_create_table_banner extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'filename' => $this->string()->comment('Изображение'),
            'title' => $this->string()->comment('Заголовок'),
            'description' => $this->text()->comment('Описание'),
            'button_text' => $this->string()->comment('Текст кнопки'),
            'button_url' => $this->string()->comment('Ссылка кнопки'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%banner}}');
    }
}
