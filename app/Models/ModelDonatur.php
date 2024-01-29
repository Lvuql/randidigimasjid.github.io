<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDonatur extends Model
{
    public function getDonatur()
    {
        $builder = $this->db->table('tbl_donatur');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_donatur')->insert($data);
    }
    public function deletedonatur($id)
    {
        $query = $this->db->table('tbl_donatur')->delete(array('iddonatur'=>$id));
    }
    public function updatedonatur($data, $id)
    {
        $query = $this->db->table('tbl_donatur')->update($data, array('iddonatur' => $id));
    }
}