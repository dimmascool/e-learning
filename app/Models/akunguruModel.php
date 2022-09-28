<?php

namespace App\Models;

use CodeIgniter\Model;

class akunguruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';

    protected $allowedFields = ['username', 'password', 'nama_lengkap'];
    
}