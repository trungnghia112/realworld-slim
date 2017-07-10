<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string');
        $table->addColumn('email', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('bio', 'text', ['null' => true]);
        $table->addColumn('image', 'string', ['limit' => 2048, 'null' => true]);
        $table->addTimestamps();
        $table->addIndex(['email', 'username'], ['unique' => true]);
        $table->save();
    }
}
