<?php

namespace App\Controllers;

use App\Models\ModelAgenda;
use App\Controllers\BaseController;

class Agenda extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1) {
                $model = new ModelAgenda();
                $data['agenda'] = $model->getAgenda()->getResultArray();
                echo view('agenda/v_agenda', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelAgenda();
        $data = array(
            'id_agenda' => $this->request->getPost('id'),
            'nama_agenda' => $this->request->getPost('namakegiatan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'jenis_agenda' => $this->request->getPost('jeniskegiatan'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_agenda.id_agenda]',
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
        return redirect()->to('/agenda');
    }
    public function delete()
    {
        $model = new ModelAgenda();
        $id = $this->request->getPost('id');
        $model->deleteagenda($id);
        return redirect()->to('/agenda/index');
    }
    function update()
    {
        $model = new ModelAgenda();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_agenda' => $this->request->getPost('namakegiatan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'jenis_agenda' => $this->request->getPost('jeniskegiatan'),
        );
        $model->updateagenda($data, $id);
        return redirect()->to('/agenda/index');
    }
}
