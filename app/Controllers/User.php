<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1) {
                $model = new ModelUser();
                $data['user'] = $model->getUser()->getResultArray();
                echo view('user/v_user', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelUser();
        $data = array(
            'id_user' => $this->request->getPost('id'),
            'nama_user' => $this->request->getPost('namauser'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_user.id_user]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/user');
    }
    public function delete()
    {
        $model = new ModelUser();
        $id = $this->request->getPost('id');
        $model->deleteuser($id);
        return redirect()->to('/user/index');
    }
    function update()
    {
        $model = new ModelUser();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_user' => $this->request->getPost('namauser'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        );
        $model->updateuser($data, $id);
        return redirect()->to('/user/index');
    }
}
