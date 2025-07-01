<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table      = 'diskon';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;

    protected $allowedFields = ['tanggal', 'nominal'];
}