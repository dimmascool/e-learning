<?php

namespace App\Models;

use CodeIgniter\Model;

class tugasModel extends Model
{
    protected $table      = 'tugas';
    protected $primaryKey = 'id_tugas';

    protected $allowedFields = ['id_materi', 'tugas', 'kelas'];
    
}