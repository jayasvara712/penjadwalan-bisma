<?php

namespace App\Controllers;

use App\Models\kegiatanModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Kegiatan extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-kegiatan');</script>";
    function __construct()
    {
        $this->kegiatanModel = new kegiatanModel;
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['session'] = session();
        $data['kegiatan'] = $this->kegiatanModel->findAll();
        echo view('admin/kegiatan', $data) . $this->menu;
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
        echo view('admin/kegiatan/add', $data) . $this->menu;
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
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Judul !'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Deskripsi !'
                ]
            ],
            'foto' => [
                'rules' =>
                'uploaded[foto]' .
                    'required' .
                    '|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'required' => 'Masukkan Foto !',
                    'uploaded' => 'Harap Masukkan Foto',
                    'mime_in' => 'Extension tidak sesuai !'
                ]
            ],
            'tgl_post' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Error !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $file = $this->request->getFile('foto');
            if ($file->isValid()) {
                //upload ke public folder
                $newName = $file->getRandomName();
                $file->move('upload/galeri', $newName);
            } else {
                $newName = 'no_image.png';
            }
            $data = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $newName,
                'tgl_post' => $this->request->getPost('tgl_post'),

            ];
            $this->kegiatanModel->insert($data);
            return redirect()->to(site_url('kegiatan'))->with('success', 'Kegiatan Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_kegiatan = null)
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
            echo view('admin/kegiatan/edit', $data) . $this->menu;
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
    public function update($id_kegiatan = null)
    {
        $validation = $this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Judul !'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Deskripsi !'
                ]
            ],
            'foto' => [
                'rules' =>
                'mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai !'
                ]
            ],
            'tgl_post' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Error !'
                ]
            ],

        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $file = $this->request->getFile('foto');
        if ($file->getError() == 4) {
            $newName = $this->request->getPost('foto_lama');
        } else {
            $newName = $file->getRandomName();
            $file->move('upload/galeri', $newName);
            //jika gambar default
            if ($this->request->getPost('foto_lama') != 'no-image.png') {
                unlink('upload/galeri/' . $this->request->getPost('foto_lama'));
            }
        }
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $newName,
        ];
        $this->kegiatanModel->update($id_kegiatan, $data);
        return redirect()->to(site_url('kegiatan'))->with('success', 'Kegiatan Berhasil Dirubah');
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
    public function delete($id_kegiatan = null)
    {
        if ($this->request->getPost('foto') != 'no-image.png') {
            unlink('upload/galeri/' . $this->request->getPost('foto'));
        }
        $this->kegiatanModel->where('id_kegiatan', $id_kegiatan)->delete();
        return redirect()->to(site_url('kegiatan'))->with('success', 'Kegiatan Berhasil Dihapus');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $kegiatan = $this->kegiatanModel->where('id_kegiatan', $id)->first();
        if ($kegiatan->foto != 'no-image.png') {
            unlink('upload/galeri/' . $kegiatan->foto);
        }
        $this->kegiatanModel->where('id_kegiatan', $id)->delete();
        return redirect()->to(site_url('kegiatan'))->with('success', 'Kegiatan Berhasil Dihapus');
    }
}
