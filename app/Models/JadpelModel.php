<?php

namespace App\Models;

use CodeIgniter\CLI\Console;
use CodeIgniter\Model;


class JadpelModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'jadpel';
    protected $primaryKey           = 'id_jadpel';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'id_ta',
        'id_kelas',
        'id_mapel',
        'id_guru',
        'id_hari',
        'id_jampel',
    ];

    protected $attributes = [
        'jadpel_data' => null,
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }

    function getAll()
    {
        $query = 'SELECT jadpel.*,tahunajaran.*,kelas.*, hari.*,  jampel.*, mapel.*, guru.* FROM jadpel 
                    LEFT JOIN tahunajaran on tahunajaran.id_ta = jadpel.id_ta 
                    LEFT JOIN kelas on kelas.id_kelas = jadpel.id_kelas 
                    LEFT JOIN hari on hari.id_hari = jadpel.id_hari 
                    LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
                    LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
                    LEFT JOIN guru on guru.id_guru = jadpel.id_guru 
                    ORDER BY tahunajaran.ta DESC, kelas.nama_kelas ASC, hari.id_hari ASC, jampel.nama_jam ASC';

        $ex = $this->db->query($query);
        // var_dump();

        return $ex->getResult();
    }

    function getSpecific($id_jadpel)
    {
        $query = 'SELECT jadpel.*,tahunajaran.*,kelas.*, hari.*,  jampel.*, mapel.*, guru.* FROM jadpel 
                    LEFT JOIN tahunajaran on tahunajaran.id_ta = jadpel.id_ta 
                    LEFT JOIN kelas on kelas.id_kelas = jadpel.id_kelas 
                    LEFT JOIN hari on hari.id_hari = jadpel.id_hari 
                    LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
                    LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
                    LEFT JOIN guru on guru.id_guru = jadpel.id_guru 
                    WHERE jadpel.id_jadpel = ' . $id_jadpel;

        $ex = $this->db->query($query);
        // var_dump();

        return $ex->getResult();
    }

    function get_mapel()
    {
        $builder = $this->db->table('mapel');
        $builder->orderBy('nama_mapel', 'ASC');

        return $builder->get()->getResult();
    }

    function get_guru($id_ta, $id_mapel, $id_hari, $id_jampel, $id_kelas)
    {
        $query = 'SELECT guru.* FROM guru 
                    LEFT JOIN jadpel on guru.id_guru = jadpel.id_guru 
                        AND jadpel.id_ta = ' . $id_ta . '
                        AND jadpel.id_hari = ' . $id_hari . '
                        AND jadpel.id_jampel= ' . $id_jampel . '
                        AND jadpel.id_mapel = ' . $id_mapel . '
                    LEFT JOIN (SELECT id_ta, id_kelas, id_hari, id_jampel, id_mapel, id_guru 
						FROM jadpel 
						WHERE id_ta = ' . $id_ta . ' AND id_kelas= ' . $id_kelas . ' AND id_hari = ' . $id_hari . ' AND id_jampel= ' . $id_jampel . ' AND id_mapel= ' . $id_mapel . '
                        GROUP BY id_guru 
                        HAVING COUNT(id_guru)>3) AS guru_sbk 
                    ON guru_sbk.id_guru = guru.id_guru
                WHERE jadpel.id_jadpel is null 
                    AND guru_sbk.id_guru is null 
                    AND guru.id_mapel = ' . $id_mapel;

        $ex = $this->db->query($query);
        // var_dump();

        return $ex->getResult();

        // $builderc = $this->db->table('jadpel');
        // $builderc->select('id_guru');
        // $where = 'id_kelas =' . $id_kelas . ' AND id_hari=' . $id_hari;
        // $builderc->where($where);
        // $builderc->groupBy('id_guru');
        // $builderc->having('count(id_guru)>1');
        // $x = $builderc->get()->getResultArray();



        // $builder = $this->db->table('guru');
        // $builder->select('guru.*');
        // $builder->join('jadpel', 'guru.id_guru = jadpel.id_guru AND jadpel.id_hari=' . $id_hari . ' AND jadpel.id_jampel=' . $id_jampel . '  AND jadpel.id_mapel=' . $id_mapel, 'left');
        // $where = 'jadpel.id_jadpel is null AND guru.id_mapel =' . $id_mapel;
        // $builder->where($where);
        // if (count($x) > 0) {
        //     $builder->WhereNotIn('id_guru', $x);
        // }

        // return $builder->get()->getResult();
    }

    function get_jadpel($id_kelas, $id_ta)
    {
        // $query = 'SELECT mapel.*, jampel.* FROM jadpel 
        //             LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
        //             LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
        //             WHERE jadpel.id_kelas = ' . $id_kelas . '
        //             ORDER BY jampel.nama_jam ASC';

        $query = 'SELECT tahunajaran.*, mapel.*, hari.*, jampel.*,guru.* FROM jadpel 
                    LEFT JOIN tahunajaran on tahunajaran.id_ta = jadpel.id_ta 
                    LEFT JOIN hari on hari.id_hari = jadpel.id_hari 
                    LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
                    LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
                    LEFT JOIN guru on guru.id_guru = jadpel.id_guru 
                    WHERE jadpel.id_kelas = ' . $id_kelas . ' AND jadpel.id_ta =' . $id_ta;

        $ex = $this->db->query($query);
        // var_dump();

        return $ex->getResult();
    }

    function get_jadpel_ta($id_ta)
    {
        // $query = 'SELECT mapel.*, jampel.* FROM jadpel 
        //             LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
        //             LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
        //             WHERE jadpel.id_kelas = ' . $id_kelas . '
        //             ORDER BY jampel.nama_jam ASC';

        $query = 'SELECT jadpel.*,tahunajaran.*,kelas.*, mapel.*, hari.*, jampel.*,guru.* FROM jadpel 
                    LEFT JOIN tahunajaran on tahunajaran.id_ta = jadpel.id_ta 
                    LEFT JOIN kelas on kelas.id_kelas = jadpel.id_kelas 
                    LEFT JOIN hari on hari.id_hari = jadpel.id_hari 
                    LEFT JOIN jampel on jampel.id_jampel = jadpel.id_jampel
                    LEFT JOIN mapel on mapel.id_mapel = jadpel.id_mapel 
                    LEFT JOIN guru on guru.id_guru = jadpel.id_guru 
                    WHERE jadpel.id_ta = ' . $id_ta;

        $ex = $this->db->query($query);
        // var_dump();

        return $ex->getResult();
    }

    function cetak_jadpel($id_kelas, $id_ta)
    {
        $builder = $this->db->table('jadpel');
        $builder->select('tahunajaran.*,kelas.*,mapel.*,hari.*,jampel.*,guru.*');
        $builder->join('tahunajaran', 'tahunajaran.id_ta = jadpel.id_ta', 'left');
        $builder->join('kelas', 'kelas.id_kelas = jadpel.id_kelas', 'left');
        $builder->join('mapel', 'mapel.id_mapel = jadpel.id_mapel', 'left');
        $builder->join('hari', 'hari.id_hari = jadpel.id_hari', 'left');
        $builder->join('guru', 'guru.id_guru = jadpel.id_guru', 'left');
        $builder->join('jampel', 'jampel.id_jampel = jadpel.id_jampel', 'left');
        $builder->where('jadpel.id_ta', $id_ta);
        $builder->where('jadpel.id_kelas', $id_kelas);
        $builder->orderBy('jampel.nama_jam', 'asc');

        return $builder->get()->getResult();
    }

    public function cari_data($arrayP, $fieldP, $valueP)
    {
        return array_filter($arrayP, function ($item) use ($fieldP, $valueP) {
            return $item[$fieldP] == $valueP;
        });
    }
}

class tabelJadpel
{
    public int $jam;
    public $waktu;
    public $senin;
    public $selasa;
    public $rabu;
    public $kamis;
    public $jumat;
    public $sabtu;
    public $minggu;
}
