<?php

namespace App\Models;

use CodeIgniter\Model;

class HariModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'hari';
    protected $primaryKey           = 'id_hari';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_hari'
    ];

    protected $attributes = [
        'hari_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
