<?php

namespace App\Controllers;

use App\Models\taModel;
use App\Models\kelasModel;
use App\Models\hariModel;
use App\Models\jampelModel;
use App\Models\mapelModel;
use App\Models\guruModel;
use App\Models\jadpelModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\RESTful\ResourcePresenter;

class Jadpel extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-jadpel');</script>";
    function __construct()
    {
        $this->taModel = new taModel();
        $this->kelasModel = new kelasModel();
        $this->hariModel = new hariModel();
        $this->jampelModel = new jampelModel();
        $this->mapelModel = new mapelModel();
        $this->guruModel = new guruModel();
        $this->jadpelModel = new jadpelModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {

        $kunci = $this->request->getVar('id_ta');
        if ($kunci) {
            $query = $this->jadpelModel->get_jadpel_ta($kunci);
        } else {
            $_GET['id_ta'] = "";
            $query = $this->jadpelModel->getAll();
        }

        $data['session'] = session();
        $data['ta'] = $this->taModel->findAll();
        $data['jadpel'] = $query;
        $data['kelas'] = $this->kelasModel->findAll();
        $data['jampel'] = $this->jampelModel->findAll();

        echo view('admin/jadpel', $data) . $this->menu;
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        $data['session'] = session();
        $data['ta'] = $this->taModel->findAll();
        $data['kelas'] = $this->kelasModel->findAll();
        $data['hari'] = $this->hariModel->findAll();
        $data['jampel'] = $this->jampelModel->findAll();
        $data['mapel'] = $this->jadpelModel->get_mapel();
        // $data['guru'] = $this->guruModel->findAll();
        echo view('admin/jadpel/add', $data) . $this->menu;
    }

    public function get_guru()
    {
        $id_ta = $this->request->getPost('id_ta');
        $id_mapel = $this->request->getPost('id_mapel');
        $id_kelas = $this->request->getPost('id_kelas');
        $id_hari = $this->request->getPost('id_hari');
        $id_jampel = $this->request->getPost('id_jampel');

        $cek = $this->mapelModel->select('nama_mapel')->where('id_mapel', $id_mapel)->first();

        $data = $this->jadpelModel->get_guru($id_ta, $id_mapel, $id_hari, $id_jampel, $id_kelas, $cek);
        echo json_encode($data);
    }

    public function get_jadpel()
    {
        // $id = $this->r;
        $id_kelas = $this->request->getPost('id_kelas');
        $id_ta = $this->request->getPost('id_ta');
        $data = $this->jadpelModel->get_jadpel($id_kelas, $id_ta);
        echo json_encode($data);
    }

    public function get_jadpel_ta()
    {
        $id_ta = $this->request->getPost('id_ta');
        $data = $this->jadpelModel->get_jadpel_ta($id_ta);
        echo json_encode($data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $validation = $this->validate([
            'id_ta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Tahun Ajaran '
                ]
            ],
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kelas '
                ]
            ],
            'id_hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Hari '
                ]
            ],
            'id_jampel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jam Pelajaran '
                ]
            ],
            'id_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Mata Pelajaran '
                ]
            ],
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Guru '
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'id_ta' => $this->request->getPost('id_ta'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_mapel' => $this->request->getPost('id_mapel'),
                'id_guru' => $this->request->getPost('id_guru'),
                'id_hari' => $this->request->getPost('id_hari'),
                'id_jampel' => $this->request->getPost('id_jampel'),
            ];
            $this->jadpelModel->insert($data);
            return redirect()->to(site_url('jadpel'))->with('success', 'Jadwal Pelajaran Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_jadpel = null)
    {
        // $data['guru'] = $this->guruModel->findAll();
        $jadpel = $this->jadpelModel->where('id_jadpel', $id_jadpel)->first(); //Cek data
        session();

        if (is_object($jadpel)) {
            $data['session'] = session();
            $data['ta'] = $this->taModel->findAll();
            $data['kelas'] = $this->kelasModel->findAll();
            $data['hari'] = $this->hariModel->findAll();
            $data['jampel'] = $this->jampelModel->findAll();
            $data['mapel'] = $this->jadpelModel->get_mapel();
            $data['jadpel'] = $this->jadpelModel->getSpecific($id_jadpel);
            echo view('admin/jadpel/edit', $data) . $this->menu;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id_jadpel = null)
    {
        $validation = $this->validate([
            'id_ta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Tahun Ajaran !'
                ]
            ],
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kelas !'
                ]
            ],
            'id_hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Hari !'
                ]
            ],
            'id_jampel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jam Pelajaran !'
                ]
            ],
            'id_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Mata Pelajaran !'
                ]
            ],
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Guru !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'id_ta' => $this->request->getPost('id_ta'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_hari' => $this->request->getPost('id_hari'),
            'id_jampel' => $this->request->getPost('id_jampel'),
            'id_mapel' => $this->request->getPost('id_mapel'),
            'id_guru' => $this->request->getPost('id_guru'),
        ];
        $this->jadpelModel->update($id_jadpel, $data);
        return redirect()->to(site_url('jadpel'))->with('success', 'Jadwal Pelajaran Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->jadpelModel->where('id_jadpel', $id)->delete();
        return redirect()->to(site_url('jadpel'))->with('success', 'Jadwal Pelajaran Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->jadpelModel->where('id_jadpel', $id)->delete();
        return redirect()->to(site_url('jadpel'))->with('success', 'Jadwal Pelajaran Berhasil Dihapus');
    }
}
