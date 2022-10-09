<?php

namespace App\Controllers;

use App\Models\mapelModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Mapel extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-mapel');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->mapelModel = new mapelModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['mapel'] = $this->mapelModel->findAll();
        echo view('admin/mapel', $data) . $this->menu . $this->header;
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
        echo view('admin/mapel/add', $data) . $this->menu . $this->header;
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
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Mata Pelajaran !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'nama_mapel' => $this->request->getPost('nama_mapel'),
            ];
            $this->mapelModel->insert($data);
            return redirect()->to(site_url('mapel'))->with('success', 'Mata Pelajaran Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_mapel = null)
    {
        $mapel = $this->mapelModel->where('id_mapel', $id_mapel)->first();
        session();
        $data = [
            'session' => session(),
            'mapel' => $mapel,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($mapel)) {
            $data['mapel'] = $mapel;
            echo view('admin/mapel/edit', $data) . $this->menu . $this->header;
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
    public function update($id_mapel = null)
    {
        $validation = $this->validate([
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Mata Pelajaran !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_mapel' => $this->request->getPost('nama_mapel'),
        ];
        $this->mapelModel->update($id_mapel, $data);
        return redirect()->to(site_url('mapel'))->with('success', 'Kelas Berhasil Dirubah');
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
        $this->mapelModel->where('id_mapel', $id)->delete();
        return redirect()->to(site_url('mapel'))->with('success', 'Mata Pelajaran Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->mapelModel->where('id_mapel', $id)->delete();
        return redirect()->to(site_url('mapel'))->with('success', 'Mata Pelajaran Berhasil Dihapus');
    }
}
