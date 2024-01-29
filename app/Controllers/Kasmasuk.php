<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkaskeluar;
use App\Models\Modelkasmasuk;

class Kasmasuk extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modelkasmasuk();
                $data['kasmasuk'] = $model->getKasmesjid()->getResultArray();
                $data['data_donatur'] = $model->getDonatur()->getResult();
                echo view('kasmesjid/vkasmasuk', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }

    public function save()
    {
        $model = new Modelkasmasuk();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            'jenis_kas' => $this->request->getPost('jeniskas'),
            'iddonaturmasjid' => $this->request->getPost('iddonatur'),
        );

        $model->insertData($data);
        return redirect()->to('/kasmasuk');
    }

    public function delete()
    {
        $model = new Modelkasmasuk();
        $id = $this->request->getPost('id');
        $model->deletekasmasuk($id);
        return redirect()->to('/kasmasuk/index');
    }

    function update()
    {
        $model = new Modelkasmasuk();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            'jenis_kas' => $this->request->getPost('jeniskas'),
            'iddonaturmasjid' => $this->request->getPost('iddonatur'),
        );
        $model->updatekasmasuk($data, $id);
        return redirect()->to('/kasmasuk/index');
    }

    public function laporankasmasuk()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 2 || $userLevel == 3) {
                $model = new Modelkasmasuk();
                $data['data'] = $model->getLaporanUangMasuk()->getResultArray();
                echo view('kasmesjid/cetak_laporan', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }

    public function laporanperperiode()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3 || $userLevel == 2) {
                echo view('kasmesjid/vlaporankasmasuk');
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    } 

    public function cetaklaporanperperiode()
    {
        $model = new Modelkasmasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kasmesjid/vcetaklaporanperperiode', $data);
    }

    public function laporanperperiodeperjeniskas()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 2 || $userLevel == 3) {
                echo view('kasmesjid/vlaporanperjeniskas');
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }

    public function cetaklaporanperperiodejeniskas()
    {
        $model = new Modelkasmasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jenis_kas');
        $query = $model->getLaporanperperiodeperjenis($tgla, $tglb, $jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('kasmesjid/v_cetaklaporanperperiodejeniskas', $data);
    }
}
