<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mapel extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_mapel' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_mapel' => [
                'type' => 'varchar',
                'constraint' => '1000'
            ]
        ]);
        $this->forge->addKey('id_mapel', true);
        $this->forge->createTable('mapel');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
