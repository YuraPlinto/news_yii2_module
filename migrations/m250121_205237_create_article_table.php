<?php

namespace app\modules\news\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m250121_205237_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id'        => $this->primaryKey(),
            'title'     => $this->string()->notNull(),
            'img_url'   => $this->string(),
            'content'   => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
