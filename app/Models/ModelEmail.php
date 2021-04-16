<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEmail extends Model
{
    protected $table      = 'email_pegawai';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nip', 'email', 'pass_awal', 'pass_baru'];
}