<?php

namespace App\Models;

use CodeIgniter\Model;


class StudentModel extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'studentID';
    protected $allowedFields = [
        'sportID',
        'studentFirstname',
        'studentSurname',
        'studentNumber',
        'studentCell',
        'studentGender',
        'studentEmail',
        'studentAddress',
        'studentDob',
        'createdAt',
        'status'
    ];
}
