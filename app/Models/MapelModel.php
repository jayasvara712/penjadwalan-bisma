<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'mapel';
    protected $primaryKey           = 'id_mapel';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_mapel'
    ];

    protected $attributes = [
        'mapel_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
