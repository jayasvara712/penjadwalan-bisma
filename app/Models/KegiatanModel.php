<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'kegiatan';
    protected $primaryKey           = 'id_kegiatan';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'judul',
        'deskripsi',
        'foto',
        'tgl_post'
    ];
    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }

    public function landing_page()
    {
        $builder = $this->db->table($this->table)->orderBy('tgl_post', 'DESC')->limit(3);
        return $builder->get()->getResult();
    }

    public function kegiatan_list()
    {
        $builder = $this->db->table($this->table)->orderBy('tgl_post', 'DESC');
        return $builder->get()->getResult();
    }
}
