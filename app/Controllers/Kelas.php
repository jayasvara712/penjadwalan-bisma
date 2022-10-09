<?php

namespace App\Controllers;

use App\Models\kelasModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Kelas extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-kelas');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->kelasModel = new kelasModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['kelas'] = $this->kelasModel->findAll();
        echo view('admin/kelas', $data) . $this->menu . $this->header;
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
        echo view('admin/kelas/add', $data) . $this->menu . $this->header;
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
            'nama_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Kelas !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'nama_kelas' => $this->request->getPost('nama_kelas'),

            ];
            $this->kelasModel->insert($data);
            return redirect()->to(site_url('kelas'))->with('success', 'Kelas Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_kelas = null)
    {
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)->first();
        session();
        $data = [
            'session' => session(),
            'kelas' => $kelas,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($kelas)) {
            $data['kelas'] = $kelas;
            echo view('admin/kelas/edit', $data) . $this->menu . $this->header;
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
    public function update($id_kelas = null)
    {
        $validation = $this->validate([
            'nama_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Kelas !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
        ];
        $this->kelasModel->update($id_kelas, $data);
        return redirect()->to(site_url('kelas'))->with('success', 'Kelas Berhasil Dirubah');
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
        $this->kelasModel->where('id_kelas', $id)->delete();
        return redirect()->to(site_url('kelas'))->with('success', 'Kelas Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->kelasModel->where('id_kelas', $id)->delete();
        return redirect()->to(site_url('kelas'))->with('success', 'Kelas Berhasil Dihapus');
    }
}
