<?php

namespace App\Models;

use CodeIgniter\Model;


class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staffID';
    protected $allowedFields = [
        'staffRole',
        'staffFirstname',
        'staffSurname',
        'staffNumber',
        'staffCell',
        'staffGender',
        'staffEmail',
        'staffAddress',
        'staffDob',
        'createdAt',
        'status'
    ];
}
