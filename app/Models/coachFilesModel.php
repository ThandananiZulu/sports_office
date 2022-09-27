<?php

namespace App\Models;

use CodeIgniter\Model;


class CoachFilesModel extends Model
{
    protected $table = 'coachfiles';
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
