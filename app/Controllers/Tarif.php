<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltarif;

class Tarif extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1) {
                $model = new Modeltarif();
                $data['tarif'] = $model->getTarif()->getResultArray();
                echo view('tarif/v_tarif', $data);
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
            $model = new Modeltarif();
            $data = array( 
                'idtarif' => $this->request->getPost('id'),
                'klass' => $this->request->getPost('klass'),
                'tarif' => $this->request->getPost('tarif'),
            );
            if (!$this->validate([
                'id' => [
                    'rules' => 'required|is_unique[tbl_tarif.idtarif]',
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
            return redirect()->to('/tarif');
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}
