<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        //
    }
}
