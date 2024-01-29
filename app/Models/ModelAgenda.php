<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    public function getAgenda()
    {
        $builder = $this->db->table('tbl_agenda');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_agenda')->insert($data);
    }
    public function deleteagenda($id)
    {
        $query = $this->db->table('tbl_agenda')->delete(array('id_agenda'=>$id));
    }
    public function updateagenda($data, $id)
    {
        $query = $this->db->table('tbl_agenda')->update($data, array('id_agenda' => $id));
    }
}