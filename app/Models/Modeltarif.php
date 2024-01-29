<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltarif extends Model
{
    public function getTarif()
    {
        $builder = $this->db->table('tbl_tarif');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_tarif')->insert($data);
    }
}
 