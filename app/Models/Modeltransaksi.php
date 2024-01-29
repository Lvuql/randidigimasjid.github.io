<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltransaksi extends Model
{
      // MODEL ANAK YATIM

    public function getTransaksi()
    {
        $builder = $this->db->table('tbl_transaksi')
        ->join('tbl_pelanggan', 'idpel=id')
        ->join('tbl_tarif', 'idharga=idtarif');
        return $builder->get();
    }

    public function getPelanggan()
    {
        $builder = $this->db->table('tbl_pelanggan');
        return $builder->get();
    }
    public function getTarif()
    {
        $builder = $this->db->table('tbl_tarif');
        return $builder->get();
    }

    public function getTotal()
    {
        $builder = $this->db->table('tbl_kas_masjid')
            ->where('jenis_kas="Anak Yatim"');
        return $builder->get();
    }

    public function getTotalkas()
    {
        $builder = $this->db->query('select sum(kas_masuk) as totalmasuk from tbl_kas_masjid where jenis_kas="Anak Yatim"');
        return $builder;
    }

    
    public function getTotalkaskeluar()
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


}
