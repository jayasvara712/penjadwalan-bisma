<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hari extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_hari' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_hari' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id_hari', true);
        $this->forge->createTable('hari');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
