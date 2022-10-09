<?php

namespace App\Controllers;

use App\Models\HariModel;
use App\Models\jampelModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Jampel extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-jampel');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->hariModel = new HariModel();
        $this->jampelModel = new jampelModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['jampel'] = $this->jampelModel->findAll();
        echo view('admin/jampel', $data) . $this->menu . $this->header;
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
        $data['hari'] = $this->hariModel->findAll();
        echo view('admin/jampel/add', $data) . $this->menu . $this->header;
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
            'nama_jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Jam Pelajaran !'
                ]
            ],
            'waktu_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Waktu Mulai !'
                ]
            ],
            'waktu_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Waktu Selesai !'
                ]
            ],
        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'nama_jam' => $this->request->getPost('nama_jam'),
                'waktu_masuk' => $this->request->getPost('waktu_masuk'),
                'waktu_selesai' => $this->request->getPost('waktu_selesai'),
            ];

            $this->jampelModel->insert($data);
            return redirect()->to(site_url('jampel'))->with('success', 'Jam Pelajaran Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_jampel = null)
    {
        $hari = $this->hariModel->findAll();
        $jampel = $this->jampelModel->where('id_jampel', $id_jampel)->first();
        session();
        $data = [
            'session' => session(),
            'jampel' => $jampel,
            'hari' => $hari,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($jampel)) {
            $data['jampel'] = $jampel;
            echo view('admin/jampel/edit', $data) . $this->menu . $this->header;
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
    public function update($id_jampel = null)
    {
        $validation = $this->validate([
            'nama_jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Jam Pelajaran !'
                ]
            ],
            'waktu_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Waktu Mulai !'
                ]
            ],
            'waktu_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Waktu Selesai !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_jam' => $this->request->getPost('nama_jam'),
            'waktu_masuk' => $this->request->getPost('waktu_masuk'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
        ];
        $this->jampelModel->update($id_jampel, $data);
        return redirect()->to(site_url('jampel'))->with('success', 'Jam Pelajaran Berhasil Dirubah');
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
        $this->jampelModel->where('id_jampel', $id)->delete();
        return redirect()->to(site_url('jampel'))->with('success', 'Jam Pelajaran Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->jampelModel->where('id_jampel', $id)->delete();
        return redirect()->to(site_url('jampel'))->with('success', 'Jam Pelajaran Berhasil Dihapus');
    }
}
