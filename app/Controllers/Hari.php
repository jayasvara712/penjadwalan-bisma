<?php

namespace App\Controllers;

use App\Models\hariModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Hari extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-hari');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->hariModel = new hariModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['hari'] = $this->hariModel->findAll();
        echo view('admin/hari', $data) . $this->menu . $this->header;
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
        echo view('admin/hari/add', $data) . $this->menu . $this->header;
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
            'nama_hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Hari !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'nama_hari' => $this->request->getPost('nama_hari'),

            ];
            $this->hariModel->insert($data);
            return redirect()->to(site_url('hari'))->with('success', 'Hari Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_hari = null)
    {
        $hari = $this->hariModel->where('id_hari', $id_hari)->first();
        session();
        $data = [
            'session' => session(),
            'hari' => $hari,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($hari)) {
            $data['hari'] = $hari;
            echo view('admin/hari/edit', $data) . $this->menu . $this->header;
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
    public function update($id_hari = null)
    {
        $validation = $this->validate([
            'nama_hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Hari !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_hari' => $this->request->getPost('nama_hari'),
        ];
        $this->hariModel->update($id_hari, $data);
        return redirect()->to(site_url('hari'))->with('success', 'Hari Berhasil Dirubah');
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
        $this->hariModel->where('id_hari', $id)->delete();
        return redirect()->to(site_url('hari'))->with('success', 'Hari Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->hariModel->where('id_hari', $id)->delete();
        return redirect()->to(site_url('hari'))->with('success', 'Hari Berhasil Dihapus');
    }
}
