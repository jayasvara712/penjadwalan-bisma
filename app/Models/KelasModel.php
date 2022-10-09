<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'kelas';
    protected $primaryKey           = 'id_kelas';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_kelas'
    ];

    protected $attributes = [
        'kelas_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
