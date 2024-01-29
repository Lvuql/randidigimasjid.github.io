<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1) {
                $model = new Modelpelanggan();
                $data['pelanggan'] = $model->getPelanggan()->getResultArray();
                echo view('pelanggan/v_pelanggan', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }   
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }

    public function save()
    {
        if (session()->get('masuk') == true) {
            $model = new Modelpelanggan();
            $data = array( 
                'id' => $this->request->getPost('id'),
                'nama' => $this->request->getPost('nama'),
                'nohp' => $this->request->getPost('nohp'),
                'alamat' => $this->request->getPost('alamat'),
            );
            if (!$this->validate([
                'id' => [
                    'rules' => 'required|is_unique[tbl_pelanggan.id]',
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
            return redirect()->to('/pelanggan');
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}
