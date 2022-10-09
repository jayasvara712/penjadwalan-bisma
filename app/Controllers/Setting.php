<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Setting extends ResourceController
{
    private $menu = "<script language=\"javascript\">menu('m-setting');</script>";
    function __construct()
    {
        $this->UserModel = new UserModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id_user = null)
    {
        $session = session();
        $user = $this->UserModel->where('id_user', $id_user)->first();
        session();
        $data = [
            'session' => $session,
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($user)) {
            $data['user'] = $user;
            echo view('admin/setting', $data) . $this->menu;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id_user = null)
    {
        $post = $this->request->getPost();
        $user = $this->UserModel->where('id_user', $id_user)->first();
        session();

        if ($user) {
            if ($post['password'] == $post['confm_password']) {
                $data =
                    [
                        'username' => $post['username'],
                        'password' => password_hash($post['password'], PASSWORD_BCRYPT),
                    ];

                $this->UserModel->update($id_user, $data);
                return redirect()->to(site_url('dashboard'))->with('success', 'Berhasil Mengganti Password !');
            } else {
                return redirect()->back()->with('error', 'Password tidak sama');
            }
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
