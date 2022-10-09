<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\HariModel;
use App\Models\JadpelModel;
use App\Models\JampelModel;
use App\Models\KegiatanModel;
use App\Models\KelasModel;
use App\Models\MapelModel;
use App\Models\TaModel;

class Home extends BaseController
{
    private $menu1 = "<script language=\"javascript\">menu('m-home');</script>";
    private $menu2 = "<script language=\"javascript\">menu('m-jadpel');</script>";
    private $menu3 = "<script language=\"javascript\">menu('m-kegiatan');</script>";
    function __construct()
    {
        $this->taModel = new TaModel();
        $this->kelasModel = new KelasModel();
        $this->hariModel = new HariModel();
        $this->jampelModel = new JampelModel();
        $this->mapelModel = new MapelModel();
        $this->guruModel = new GuruModel();
        $this->jadpelModel = new JadpelModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data['kegiatan'] = $this->kegiatanModel->landing_page();
        echo view('publik/index', $data) . $this->menu1;
    }

    public function jadwal_pelajaran()
    {
        $date = (int)date("Y");
        $month = date('m');

        // cek semester
        if ($month >= 1 && $month <= 6) {
            $array = ['ta' => $date, 'semester' => 'Genap'];
            $cek_tahun = $this->taModel->where($array)->first();
            $id_ta = $cek_tahun->id_ta;
        } else if ($month >= 7 && $month <= 12) {
            $array = ['ta' => $date, 'semester' => 'Ganjil'];
            $cek_tahun = $this->taModel->where($array)->first();
            $id_ta = $cek_tahun->id_ta;
        }

        $data['ta'] = $this->taModel->where('id_ta', $id_ta)->first();
        $data['jadpel'] = $this->jadpelModel->getAll();
        $data['jadpel'] = $this->jadpelModel->getAll();
        $data['kelas'] = $this->kelasModel->findAll();
        $data['jampel'] = $this->jampelModel->findAll();

        echo view('publik/jadpel', $data) . $this->menu2;
    }

    public function get_jadpel()
    {
        $id_kelas = $this->request->getPost('id_kelas');

        $date = (int)date("Y");
        $month = date('m');

        // cek semester
        if ($month >= 1 && $month <= 6) {
            $array = ['ta' => $date, 'semester' => 'Genap'];
            $cek_tahun = $this->taModel->where($array)->first();
            $id_ta = $cek_tahun->id_ta;
        } else if ($month >= 7 && $month <= 12) {
            $array = ['ta' => $date, 'semester' => 'Ganjil'];
            $cek_tahun = $this->taModel->where($array)->first();
            $id_ta = $cek_tahun->id_ta;
        }

        $data = $this->jadpelModel->get_jadpel($id_kelas, $id_ta);
        echo json_encode($data);
    }

    public function kegiatan()
    {
        $data['kegiatan'] = $this->kegiatanModel->kegiatan_list();

        echo view('publik/kegiatan', $data) . $this->menu3;
    }

    public function kegiatan_view($id_kegiatan = null)
    {
        $kegiatan = $this->kegiatanModel->where('id_kegiatan', $id_kegiatan)->first();
        session();
        $data = [
            'session' => session(),
            'kegiatan' => $kegiatan,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($kegiatan)) {
            $data['kegiatan'] = $kegiatan;
            echo view('publik/kegiatan_detail', $data) . $this->menu3;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
