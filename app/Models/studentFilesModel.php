<?php

namespace App\Models;

use CodeIgniter\Model;


class StudentFilesModel extends Model
{
    protected $table = 'studentfiles';
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
