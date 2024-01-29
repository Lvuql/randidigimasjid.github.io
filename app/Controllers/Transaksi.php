<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltransaksi;

class Transaksi extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modeltransaksi();
                $data['transaksi'] = $model->getTransaksi()->getResultArray();
                $data['data_pelanggan'] = $model->getPelanggan()->getResult();
                $data['data_tarif'] = $model->getTarif()->getResult();
                echo view('transaksi/v_transaksi', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new Modeltransaksi();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluar/anakyatim';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'Anak Yatim',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertData($data);
            return redirect()->to('/kaskeluar/anakyatim');
        }
    }
}
