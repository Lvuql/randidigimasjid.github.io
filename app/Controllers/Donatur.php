<?php

namespace App\Controllers;

use App\Models\ModelDonatur;

class Donatur extends BaseController
{
    public function index()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1) {
                $model = new ModelDonatur();
                $data['donatur'] = $model->getDonatur()->getResultArray();
                echo view('donatur/v_donatur', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelDonatur();
        $data = array(
            'iddonatur' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('namadonatur'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_donatur.iddonatur]',
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
        return redirect()->to('/donatur');
    }


    public function delete()
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $model->deletedonatur($id);
        return redirect()->to('/donatur/index');
    }

    function update()
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('namadonatur'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
        );
        $model->updatedonatur($data, $id);
        return redirect()->to('/donatur/index');
    }
}
