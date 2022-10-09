<?php

namespace App\Controllers;

use App\Models\guruModel;
use App\Models\kelasModel;
use App\Models\mapelModel;
use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\TaModel;

class Dashboard extends BaseController
{
    private $menu = "<script language=\"javascript\">menu('m-dashboard');</script>";
    function __construct()
    {
        $this->taModel = new TaModel();
        $this->guruModel = new guruModel();
        $this->kelasModel = new kelasModel();
        $this->mapelModel = new mapelModel();
        $this->kegiatanModel = new KegiatanModel();
    }
    public function index()
    {
        $data['session'] = session();
        $data['ta'] = $this->taModel->countAll();
        $data['guru'] = $this->guruModel->countAll();
        $data['kelas'] = $this->kelasModel->countAll();
        $data['mapel'] = $this->mapelModel->countAll();
        $data['kegiatan'] = $this->kegiatanModel->countAll();
        echo view('admin/dashboard', $data) . $this->menu;
    }
}
