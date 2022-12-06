<?php

namespace App\Models;

use CodeIgniter\Model;

class RequisitionModel extends Model
{
    protected $table = 'requisition';
    protected $primaryKey = 'reqID';
    protected $allowedFields = [
        'reqDate',
        'payee',
        'address', 'amount', 'amountInWords',
        'sportNameAndCode',
        'firstVote',
        'availableBalance',
        'confirmation',
        'detailsOfRequest',
        'firstApplicantName',
        'firstStudentNumber',
        'firstCapacity',
        'firstSignature',
        'secondApplicantName',
        'secondStudentNumber',
        'secondCapacity',
        'secondSignature',
        'sportUnoinTreasure',
        'sportUnoinTreasureDate',
        'sportUnionPresident',
        'sportUnoinPresidentDate',
        'srcTreasure',
        'srcTreasureDate',
        'srcPresident',
        'srcPresidentDate',
        'certifiedCorrect',
        'certifiedDate',
        'financeAmount',
        'financeVote',
        'financeApproved',
        'financeDate',
        'modifiedBy',
        'modifiedAt',
        'createdBy',
        'createdAt',
        'status'
    ];
}
