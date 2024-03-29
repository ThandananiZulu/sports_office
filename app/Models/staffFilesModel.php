<?php

namespace App\Models;

use CodeIgniter\Model;


class StaffFilesModel extends Model
{
    protected $table = 'stafffiles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'rel_id',
        'rel',
        'title',
        'description',
        'file_type',
        'status'
    ];
}
