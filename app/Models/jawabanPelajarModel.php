<?php

namespace App\Models;

use CodeIgniter\Model;

class jawabanPelajarModel extends Model
{
    protected $table      = 'jawaban_soal_latihan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_soal','id_pelajar', 'id_materi', 'jawaban_pelajar'];
    
}