<?php
use yii\db\Migration;

/**
 * Handles the creation of table `newsletter_client`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m161119_155820_create_newsletter_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('newsletter_client', [
            'id' => $this->primaryKey(),
            'email' => $this->string(256),
            'phone' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('newsletter_client');
    }
}
