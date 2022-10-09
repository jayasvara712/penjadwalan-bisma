<?php

namespace App\Models;

use CodeIgniter\Model;

class JampelModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'jampel';
    protected $primaryKey           = 'id_jampel';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'id_hari',
        'nama_jam',
        'waktu_masuk',
        'waktu_selesai'
    ];

    protected $attributes = [
        'jampel_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
