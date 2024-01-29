<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkaskeluar;

class Kaskeluar extends BaseController
{
    // CONTROLLER ANAK YATIM
    public function anakyatim()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modelkaskeluar();
                $data['kaskeluar'] = $model->getKaskeluaranakyatim()->getResultArray();
                $data['data_anakyatim'] = $model->getAgendaanakyatim()->getResult();
                $data['anakyatim'] = $model->getTotalkasanakyatim()->getResultArray();
                $data['anakyatimk'] = $model->getTotalkasanakyatimkeluar()->getResultArray();
                echo view('kaskeluar/vkkanakyatim', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new Modelkaskeluar();
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
    public function delete()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar/anakyatim');
    }
    function update()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Anak Yatim',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluar($data, $id);
        return redirect()->to('/kaskeluar/anakyatim');
    }

    // CONTROLLER KELUAR TPQ
    public function tpq()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modelkaskeluar();
                $data['kaskeluar'] = $model->getKaskeluartpq()->getResultArray();
                $data['data_tpq'] = $model->getAgendatpq()->getResult();
                $data['tpq'] = $model->getTotalkastpq()->getResultArray();
                $data['tpqk'] = $model->getTotalkastpqkeluar()->getResultArray();
                echo view('kaskeluar/vkktpq', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function savetpq()
    {
        $model = new Modelkaskeluar();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluar/tpq';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'TPQ',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertData($data);
            return redirect()->to('/kaskeluar/tpq');
        }
    }
    public function deletetpq()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar/tpq');
    }
    function updatetpq()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'TPQ',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluartpq($data, $id);
        return redirect()->to('/kaskeluar/tpq');
    }

    // CONTROLLER KELUAR SOSIAL
    public function sosial()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modelkaskeluar();
                $data['kaskeluar'] = $model->getKaskeluarsosial()->getResultArray();
                $data['data_sosial'] = $model->getAgendasosial()->getResult();
                $data['sosial'] = $model->getTotalkassosial()->getResultArray();
                $data['sosialk'] = $model->getTotalkassosialkeluar()->getResultArray();
                echo view('kaskeluar/vkksosial', $data);
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function savesosial()
    {
        $model = new Modelkaskeluar();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluar/sosial';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'Sosial',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertData($data);
            return redirect()->to('/kaskeluar/sosial');
        }
    }
    public function deletesosial()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar/sosial');
    }
    function updatesosial()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Sosial',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluarsosial($data, $id);
        return redirect()->to('/kaskeluar/sosial');
    }

    // CONTROLLER KELUAR MASJID
    public function mesjid()
    {
        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');

            // Izinkan akses untuk pengguna dengan level 1 atau level 3
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new Modelkaskeluar();
                $data['kaskeluar'] = $model->getKaskeluarmesjid()->getResultArray();
                $data['data_mesjid'] = $model->getAgendamesjid()->getResult();
                $data['mesjid'] = $model->getTotalkasmesjid()->getResultArray();
                $data['mesjidk'] = $model->getTotalkasmesjidkeluar()->getResultArray();
                echo view('kaskeluar/vkkmesjid', $data);;
            } else {
                echo "<script>alert('Akses Anda Dibatasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function savemesjid()
    {
        $model = new Modelkaskeluar();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluar/mesjid';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'Mesjid',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertData($data);
            return redirect()->to('/kaskeluar/mesjid');
        }
    }
    public function deletemesjid()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar/mesjid');
    }
    function updatemesjid()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Mesjid',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluarmesjid($data, $id);
        return redirect()->to('/kaskeluar/mesjid');
    }
}
