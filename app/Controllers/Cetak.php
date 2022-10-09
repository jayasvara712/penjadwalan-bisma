<?php

namespace App\Controllers;

use App\Models\TaModel;
use App\Models\GuruModel;
use App\Models\HariModel;
use App\Models\KelasModel;
use App\Models\MapelModel;
use App\Models\JadpelModel;
use App\Models\JampelModel;
use App\Controllers\BaseController;
use App\Models\tabel;
use App\Models\tabelJadpel;

class Cetak extends BaseController
{
    private $menu = "<script language=\"javascript\">menu('m-cetak');</script>";
    function __construct()
    {
        $this->taModel = new TaModel();
        $this->kelasModel = new KelasModel();
        $this->hariModel = new HariModel();
        $this->jampelModel = new JampelModel();
        $this->mapelModel = new MapelModel();
        $this->guruModel = new GuruModel();
        $this->jadpelModel = new JadpelModel();
    }
    public function index()
    {
        $data['session'] = session();
        $data['ta'] = $this->taModel->findAll();
        $data['jadpel'] = $this->jadpelModel->getAll();
        $data['kelas'] = $this->kelasModel->findAll();
        $data['jampel'] = $this->jampelModel->findAll();

        echo view('admin/cetak', $data) . $this->menu;
    }

    public function get_jadpel()
    {
        $id_kelas = $this->request->getPost('id_kelas');
        $id_ta = $this->request->getPost('id_ta');
        // $id = $this->r;
        $data = $this->jadpelModel->get_jadpel($id_kelas, $id_ta);
        echo json_encode($data);
    }

    public function print()
    {
        $dompdf = new \Dompdf\Dompdf();
        $jadpel = array();

        $id_kelas = $this->request->getPost('id_kelas');
        $id_ta = $this->request->getPost('id_ta');
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)->first();
        $ta = $this->taModel->where('id_ta', $id_ta)->first();
        $jadpelDB =  $this->jadpelModel->cetak_jadpel($id_kelas, $id_ta);
        $jamDB = $this->jampelModel->findAll();


        foreach ($jadpelDB as $key => $value) :
            $isNew = false;
            $jam = (int)$value->nama_jam;
            $waktu = $value->waktu_masuk . ' - ' . $value->waktu_selesai;
            $old_tblJadpel = current(array_filter(
                $jadpel,
                function ($e) use ($jam) {
                    return $e->jam == (int)$jam;
                }
            ));
            $tblJadpel = new tabelJadpel();
            $tblJadpel->jam = $jam;
            $tblJadpel->waktu = $waktu;
            //$tblJadpel = $old_tblJadpel;
            if ($old_tblJadpel == false) {
                $isNew = true; //$value->nama_jam;
            } else {
                $tblJadpel->jam = $old_tblJadpel->jam;
                $tblJadpel->waktu = $old_tblJadpel->waktu;
                $tblJadpel->senin = $old_tblJadpel->senin;
                $tblJadpel->selasa = $old_tblJadpel->selasa;
                $tblJadpel->rabu = $old_tblJadpel->rabu;
                $tblJadpel->kamis = $old_tblJadpel->kamis;
                $tblJadpel->jumat = $old_tblJadpel->jumat;
            }

            switch (strtolower($value->nama_hari)) {
                case "senin":
                    $tblJadpel->senin = $value->nama_mapel . '<br>' . $value->nama_guru;
                    break;
                case "selasa":
                    $tblJadpel->selasa = $value->nama_mapel . '<br>' . $value->nama_guru;
                    break;
                case "rabu":
                    $tblJadpel->rabu = $value->nama_mapel . '<br>' . $value->nama_guru;
                    break;
                case "kamis":
                    $tblJadpel->kamis = $value->nama_mapel . '<br>' . $value->nama_guru;
                    break;
                case "jumat":
                    $tblJadpel->jumat = $value->nama_mapel . '<br>' . $value->nama_guru;
                    break;
            }

            if ($isNew == true) {
                array_push($jadpel, $tblJadpel);
            } else {
                $index = array_search($old_tblJadpel, $jadpel, true);
                $jadpel[$index]->jam = $tblJadpel->jam;
                $jadpel[$index]->waktu = $tblJadpel->waktu;
                $jadpel[$index]->senin = $tblJadpel->senin;
                $jadpel[$index]->selasa = $tblJadpel->selasa;
                $jadpel[$index]->rabu = $tblJadpel->rabu;
                $jadpel[$index]->kamis = $tblJadpel->kamis;
                $jadpel[$index]->jumat = $tblJadpel->jumat;
                $jadpel[$index]->sabtu = $tblJadpel->sabtu;
                $jadpel[$index]->minggu = $tblJadpel->minggu;
            }
        endforeach;

        foreach ($jamDB as $item) {
            $jam = (int)$item->nama_jam;
            $waktu = $item->waktu_masuk . ' - ' . $item->waktu_selesai;
            $isNew = current(array_filter(
                $jadpel,
                function ($e) use ($jam) {
                    return $e->jam == (int)$jam;
                }
            ));
            if ($isNew == false) {
                $tblJadpel = new tabelJadpel();
                $tblJadpel->jam = (int)$jam;
                $tblJadpel->waktu = $waktu;
                array_push($jadpel, $tblJadpel);
            }
        }
        // $jadpel = array($x);
        $jampel = $this->jampelModel->get()->getResult();

        // dd($jadpel);
        // usort($jadpel, function ($a, $b) {
        //     // return strcmp($a->jam, $b->jam);

        //     return $a->jam < $b->jam;
        // });

        usort($jadpel, function ($a, $b) {
            if ($a->jam == $b->jam) {
                return 0;
            }
            return ($a->jam < $b->jam) ? -1 : 1;
        });

        $dompdf->loadHtml(view('admin/cetak_jadpel', ["ta" => $ta, "jadpel" => $jadpel, "jampel" => $jampel, "kelas" => $kelas]));
        $dompdf->setPaper('A4', 'landscape'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("jadwal pelajaran kelas " . $kelas->nama_kelas); //nama file pdf

        return redirect()->to(base_url('cetak'));
    }
}
