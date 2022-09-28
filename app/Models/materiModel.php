<?php

namespace App\Models;

use CodeIgniter\Model;

class materiModel extends Model
{
    protected $table      = 'materi';
    protected $primaryKey = 'id_materi';

    protected $allowedFields = ['judul', 'pemateri', 'isi', 'kelas'];
    
}