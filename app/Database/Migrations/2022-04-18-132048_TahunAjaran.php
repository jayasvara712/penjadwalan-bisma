<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAjaran extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_ta' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'ta' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'semester' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addKey('id_ta', true);
        $this->forge->createTable('tahunajaran');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
