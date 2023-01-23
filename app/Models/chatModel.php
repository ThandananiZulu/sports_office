<?php

namespace App\Models;

use CodeIgniter\Model;


class ChatModel extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'id';
    protected $allowedFields = [

        'sender',
        'reciever',
        'time',
        'message'
    ];
}
