<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jampel extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_jampel' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_jam' => [
                'type' => 'int',
                'constraint' => '100'
            ],
            'waktu_masuk' => [
                'type' => 'time'
            ],
            'waktu_selesai' => [
                'type' => 'time'
            ]
        ]);
        $this->forge->addKey('id_jampel', true);
        $this->forge->createTable('jampel');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
