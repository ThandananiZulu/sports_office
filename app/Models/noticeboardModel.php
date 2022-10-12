<?php

namespace App\Models;

use CodeIgniter\Model;


class NoticeboardModel extends Model
{
    protected $table = 'noticeboard';
    protected $primaryKey = 'noticeID';
    protected $allowedFields = [
        'description',
        'title',
        'firstImage', 'secondImage', 'thirdImage',
        'modifiedBy',
        'modifiedAt',
        'createdBy',
        'createdAt',
        'status'
    ];
}
