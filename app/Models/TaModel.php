<?php

namespace App\Models;

use CodeIgniter\Model;

class TaModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'tahunajaran';
    protected $primaryKey           = 'id_ta';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'ta', 'semester'
    ];

    protected $attributes = [
        'ta_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
