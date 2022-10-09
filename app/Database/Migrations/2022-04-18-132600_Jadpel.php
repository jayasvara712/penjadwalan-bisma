<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadpel extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_jadpel' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true
            ],
            'id_ta' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ],
            'id_kelas' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ],
            'id_hari' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ],
            'id_jampel' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ],
            'id_mapel' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ],
            'id_guru' => [
                'type' => 'int',
                'constraint' => '100',
                'unsigned' => true
            ]
        ]);
        $this->forge->addKey('id_jadpel', true);
        $this->forge->addForeignKey('id_ta', 'tahunajaran', 'id_ta', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_hari', 'hari', 'id_hari', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jampel', 'jampel', 'id_jampel', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_mapel', 'mapel', 'id_mapel', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_guru', 'guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadpel');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
