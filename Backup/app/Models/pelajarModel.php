<?php

namespace App\Models;

use CodeIgniter\Model;

class pelajarModel extends Model
{
    protected $table      = 'pelajar';
    protected $primaryKey = 'id_pelajar';

    protected $allowedFields = ['nama_depan', 'nama_belakang', 'username', 'password', 'email', 'kelas'];
    
}