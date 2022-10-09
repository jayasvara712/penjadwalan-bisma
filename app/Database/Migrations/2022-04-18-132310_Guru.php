<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_guru' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'id_mapel' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned'   => true,
            ],
            'nama_guru' => [
                'type' => 'varchar',
                'constraint' => '1000',
            ]
        ]);
        $this->forge->addKey('id_guru', true);
        $this->forge->addForeignKey('id_mapel', 'mapel', 'id_mapel', 'CASCADE', 'CASCADE');
        $this->forge->createTable('guru');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
