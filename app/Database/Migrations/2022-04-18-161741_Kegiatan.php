<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => [
                'type' => 'int',
                'constraint' => '100',
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'varchar',
                'constraint' => '1000'
            ],
            'deskripsi' => [
                'type' => 'text'
            ],
            'foto' => [
                'type' => 'varchar',
                'constraint' => '1000'
            ],
            'tgl_post' => [
                'type' => 'date',
            ]
        ]);
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        //
    }
}
