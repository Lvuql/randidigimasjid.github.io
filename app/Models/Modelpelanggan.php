<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpelanggan extends Model
{

    public function getPelanggan()
    {
        $builder = $this->db->table('tbl_pelanggan');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_pelanggan')->insert($data);
    }
}
