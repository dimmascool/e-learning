<?php

namespace App\Models;

use CodeIgniter\Model;

class latihanModel extends Model
{
    protected $table      = 'soal_latihan';
    protected $primaryKey = 'id_soal';

    protected $allowedFields = ['id_materi', 'soal', 'jawaban_benar', 'jawaban1', 'jawaban2', 'jawaban2', 'jawaban3', 'jawaban4', 'poin_soal', 'kelas', 'pemateri'];
    
}