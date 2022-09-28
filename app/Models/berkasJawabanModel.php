<?php

namespace App\Models;

use CodeIgniter\Model;

class berkasJawabanModel extends Model
{
    protected $table      = 'berkas_jawaban';
    protected $primaryKey = 'id_jawaban';

    protected $allowedFields = ['nama_file', 'id_tugas', 'id_pelajar', 'nilai_tugas','pemateri'];
    
}