<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Login extends BaseController
{
    public function index()
    {
        echo view('registrasi/login');
    }

    public function ceklogin()
    {
        $session = session();
        $model = new ModelUser(); 
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model->cek_login($username);
        if ($cek) {
            $pass = $cek['password']; 
            $verify_pass = password_verify($password, $pass);
            if ($pass == $verify_pass) {
                session()->set('username', $cek['nama_user']); 
                session()->set('level', $cek['level']);
                session()->set('masuk', TRUE);
                return redirect()->to('/layout');
            } else {
                session()->set('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak DiTemukan');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
