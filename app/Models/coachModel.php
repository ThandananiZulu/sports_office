<?php

namespace App\Models;

use CodeIgniter\Model;


class CoachModel extends Model
{
    protected $table = 'coach';
    protected $primaryKey = 'coachID';
    protected $allowedFields = [

        'coachFirstname',
        'coachSurname',
        'coachNumber',
        'coachCell',
        'coachGender',
        'coachEmail',
        'coachAddress',
        'coachDob',
        'createdAt',
        'status'
    ];
}
