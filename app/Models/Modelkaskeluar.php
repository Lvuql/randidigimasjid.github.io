<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkaskeluar extends Model
{

    // MODEL ANAK YATIM

    public function getKaskeluaranakyatim()
    {
        $builder = $this->db->table('tbl_kas_keluar')->join('tbl_agenda', 'id_agendamasjid=id_agenda')
            ->where('jenis_kas="Anak Yatim"');
        return $builder->get();
    }

    public function getAgendaanakyatim()
    {
        $builder = $this->db->table('tbl_agenda')->where('jenis_agenda="Anak Yatim"');
        return $builder->get();
    }

    public function getTotalanakyatim()
    {
        $builder = $this->db->table('tbl_kas_masjid')
            ->where('jenis_kas="Anak Yatim"');
        return $builder->get();
    }

    public function getTotalkasanakyatim()
    {
        $builder = $this->db->query('select sum(kas_masuk) as totalmasuk from tbl_kas_masjid where jenis_kas="Anak Yatim"');
        return $builder;
    }

    
    public function getTotalkasanakyatimkeluar()
    {
        $builder = $this->db->query('select sum(kas_keluar) as totalkeluar from tbl_kas_keluar where jenis_kas="Anak Yatim"');
        return $builder;
    }

    public function insertData($data)
    {
        $this->db->table('tbl_kas_keluar')->insert($data);
    }

    public function deletekaskeluar($id)
    {
        $query = $this->db->table('tbl_kas_keluar')->delete(array('id_kas_masjid' => $id));
    }
    public function updatekaskeluar($data, $id)
    {
        $query = $this->db->table('tbl_kas_keluar')->update($data, array('id_kas_masjid' => $id));
    }

    // MODEL TPQ

    public function getKaskeluartpq()
    {
        $builder = $this->db->table('tbl_kas_keluar')->join('tbl_agenda', 'id_agendamasjid=id_agenda')
            ->where('jenis_kas="TPQ"');
        return $builder->get();
    }

    public function getAgendatpq()
    {
        $builder = $this->db->table('tbl_agenda')->where('jenis_agenda="TPQ"');
        return $builder->get();
    }

    public function getTotalkastpq()
    {
        $builder = $this->db->query('select sum(kas_masuk) as totalmasuk from tbl_kas_masjid where jenis_kas="TPQ"');
        return $builder;
    }
    
    public function getTotalkastpqkeluar()
    {
        $builder = $this->db->query('select sum(kas_keluar) as totalkeluar from tbl_kas_keluar where jenis_kas="TPQ"');
        return $builder;
    }

    public function insertDatatpq($data)
    {
        $this->db->table('tbl_kas_keluar')->insert($data);
    }

    public function updatekaskeluartpq($data, $id)
    {
        $query = $this->db->table('tbl_kas_keluar')->update($data, array('id_kas_masjid' => $id));
    }

    // MODEL SOSIAL

    public function getKaskeluarsosial()
    {
        $builder = $this->db->table('tbl_kas_keluar')->join('tbl_agenda', 'id_agendamasjid=id_agenda')
            ->where('jenis_kas="Sosial"');
        return $builder->get();
    }

    public function getAgendasosial()
    {
        $builder = $this->db->table('tbl_agenda')->where('jenis_agenda="Sosial"');
        return $builder->get();
    }

    public function getTotalkassosial()
    {
        $builder = $this->db->query('select sum(kas_masuk) as totalmasuk from tbl_kas_masjid where jenis_kas="Sosial"');
        return $builder;
    }
    
    public function getTotalkassosialkeluar()
    {
        $builder = $this->db->query('select sum(kas_keluar) as totalkeluar from tbl_kas_keluar where jenis_kas="Sosial"');
        return $builder;
    }

    public function insertDatasosial($data)
    {
        $this->db->table('tbl_kas_keluar')->insert($data);
    }

    public function updatekaskeluarsosial($data, $id)
    {
        $query = $this->db->table('tbl_kas_keluar')->update($data, array('id_kas_masjid' => $id));
    }

    // MODEL SOSIAL

    public function getKaskeluarmesjid()
    {
        $builder = $this->db->table('tbl_kas_keluar')->join('tbl_agenda', 'id_agendamasjid=id_agenda')
            ->where('jenis_kas="Mesjid"');
        return $builder->get();
    }

    public function getAgendamesjid()
    {
        $builder = $this->db->table('tbl_agenda')->where('jenis_agenda="Mesjid"');
        return $builder->get();
    }

    public function getTotalkasmesjid()
    {
        $builder = $this->db->query('select sum(kas_masuk) as totalmasuk from tbl_kas_masjid where jenis_kas="Mesjid"');
        return $builder;
    }
    
    public function getTotalkasmesjidkeluar()
    {
        $builder = $this->db->query('select sum(kas_keluar) as totalkeluar from tbl_kas_keluar where jenis_kas="Mesjid"');
        return $builder;
    }

    public function insertDatamesjid($data)
    {
        $this->db->table('tbl_kas_keluar')->insert($data);
    }

    public function updatekaskeluarmesjid($data, $id)
    {
        $query = $this->db->table('tbl_kas_keluar')->update($data, array('id_kas_masjid' => $id));
    }
}
