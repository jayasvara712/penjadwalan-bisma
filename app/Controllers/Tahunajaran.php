<?php

namespace App\Controllers;

use App\Models\taModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourcePresenter;

class Tahunajaran extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-tahunajaran');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->taModel = new taModel();
    }

    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['tahunajaran'] = $this->taModel->findAll();
        echo view('admin/tahunajaran', $data) . $this->menu . $this->header;
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
        echo view('admin/tahunajaran/add', $data) . $this->menu . $this->header;
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
            'ta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Tahun Ajaran!'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Semester!'
                ]
            ],

        ]);

        if (!$validation) {
            // return redirect()->to(site_url('/tahunajaran/new'))->withInput()->with('error', $this->validator->getErrors());
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {

            $data = [
                'ta' => $this->request->getPost('ta'),
                'semester' => $this->request->getPost('semester'),

            ];
            $this->taModel->insert($data);
            return redirect()->to(site_url('tahunajaran'))->with('success', 'Tahun Ajaran Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_ta = null)
    {
        $tahunajaran = $this->taModel->where('id_ta', $id_ta)->first();
        session();
        $data = [
            'session' => session(),
            'tahunajaran' => $tahunajaran,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($tahunajaran)) {
            $data['tahunajaran'] = $tahunajaran;
            echo view('admin/tahunajaran/edit', $data) . $this->menu . $this->header;
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
    public function update($id_ta = null)
    {
        $validation = $this->validate([
            'ta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Tahun Ajaran !'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Semester!'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->taModel->update($id_ta, $data);
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Tahun Ajaran Berhasil Dirubah');
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
    public function delete($id_ta = null)
    {
        $this->taModel->where('id_ta', $id_ta)->delete();
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Tahun Ajaran Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $this->taModel->where('id_ta', $id)->delete();
        return redirect()->to(site_url('tahunajaran'))->with('success', 'Tahun Ajaran Berhasil Dihapus');
    }
}
