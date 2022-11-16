<?php

namespace App\Models;

use CodeIgniter\Model;


class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'stockID';
    protected $allowedFields = [
        'stockName',
        'stockCode',
        'stockPrice',
        'stockQuantity',
        'stockImage',
        'comments',
        'createdBy',
        'createdAt',
        'modifiedBy',
        'modifiedAt',
        'status'
    ];
}
