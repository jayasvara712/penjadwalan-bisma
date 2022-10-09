<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_kelas' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_kelas' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('kelas');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
