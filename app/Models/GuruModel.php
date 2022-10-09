<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'guru';
    protected $primaryKey           = 'id_guru';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'id_mapel',
        'nama_guru'
    ];

    protected $attributes = [
        'guru_data' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }

    function getAll()
    {
        $builder = $this->db->table('mapel');
        $builder->select(
            'mapel.id_mapel,
             nama_mapel as nama_mapel,
             guru.id_guru as id_guru,
             nama_guru as nama_guru,'
        );
        $builder->join('guru', 'guru.id_mapel = mapel.id_mapel');
        // dd($builder->get()->getResult());
        return $builder->get()->getResult();
    }
}
