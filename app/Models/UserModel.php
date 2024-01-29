<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function cek_login($username)
    {
        return $this->db->table('users')
            ->where(array('user_name' => $username))
            ->get()->getRowArray();
    }
}
 