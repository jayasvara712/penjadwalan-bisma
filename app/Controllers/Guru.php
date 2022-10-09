<?php

namespace App\Controllers;

use App\Models\mapelModel;
use App\Models\guruModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Guru extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-guru');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->mapelModel = new mapelModel();
        $this->guruModel = new guruModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['guru'] = $this->guruModel->getAll();
        echo view('admin/guru', $data) . $this->menu . $this->header;
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
        $data['mapel'] = $this->mapelModel->findAll();
        echo view('admin/guru/add', $data) . $this->menu . $this->header;
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
            'id_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Mata Pelajaran !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $nama_guru = $this->request->getPost('nama_guru');
            if ($nama_guru != null) {
                $data = [
                    'id_mapel' => $this->request->getPost('id_mapel'),
                    'nama_guru' => $nama_guru,
                ];
            } else {
                $data = [
                    'id_mapel' => $this->request->getPost('id_mapel'),
                    'nama_guru' => '',
                ];
            }
            $this->guruModel->insert($data);
            return redirect()->to(site_url('guru'))->with('success', 'Guru Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_guru = null)
    {
        $mapel = $this->mapelModel->findAll();
        $guru = $this->guruModel->where('id_guru', $id_guru)->first();
        session();

        if (is_object($guru)) {
            $data['session'] = session();
            $data['guru'] = $guru;
            $data['mapel'] = $mapel;
            $data['validation'] = \Config\Services::validation();
            echo view('admin/guru/edit', $data) . $this->menu . $this->header;
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
    public function update($id_guru = null)
    {
        $validation = $this->validate([
            'id_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Pelajaran !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $nama_guru = $this->request->getPost('nama_guru');
        if ($nama_guru != null) {
            $data = [
                'id_mapel' => $this->request->getPost('id_mapel'),
                'nama_guru' => $nama_guru,
            ];
        } else {
            $data = [
                'id_mapel' => $this->request->getPost('id_mapel'),
                'nama_guru' => '',
            ];
        }
        $this->guruModel->update($id_guru, $data);
        return redirect()->to(site_url('guru'))->with('success', 'Guru Berhasil Dirubah');
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
        $this->guruModel->where('id_guru', $id)->delete();
        return redirect()->to(site_url('guru'))->with('success', 'Guru Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->guruModel->where('id_guru', $id)->delete();
        return redirect()->to(site_url('guru'))->with('success', 'Guru Berhasil Dihapus');
    }
}
