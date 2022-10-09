<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('/login'));
    }
    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('dashboard'));
        }

        echo view('login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $userModel = new UserModel();
        // $query = $this->db->table('user')->getWhere(['username' => $post['username']]);
        $user = $userModel->where('username', $post['username'])->first();
        // $user = $query->getRow();
        if ($post['username'] != null and $post['password'] != null) {
            if ($user) {

                if (password_verify($post['password'], $user->password)) {

                    $params = [
                        "id_user" => $user->id_user,
                        "username" => $user->username
                    ];
                    session()->set($params);
                    return redirect()->to(site_url('dashboard'))->with('success', 'Login Berhasil');
                } else {
                    return redirect()->back()->with('error', 'Password Tidak Sesuai');
                }
            } else {
                return redirect()->back()->with('error', 'Username tidak ditemukan !');
            }
        } else {
            return redirect()->back()->with('error', 'Data tidak boleh kosong !');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
