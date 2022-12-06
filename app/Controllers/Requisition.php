<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\requisitionModel;

class Requisition extends BaseController
{
    protected $modelName = 'App\Models\requisitionModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new requisitionModel();
        $students = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('requisition');
        $builder->select('requisition.*, sport.sportName as sportName');
        $builder->join('sport', 'requisition.sportNameAndCode = sport.sportID', 'left');
        $builder->where('status', 1);
        $data = $builder->get()->getResult();


        $output = array(
            'draw' => $draw,
            'recordsTotal' => count($students),
            'recordsFiltered' => count($students),
            'data' => $data
        );

        return $this->respond($output);
    }

    public function create()
    {
        helper(['form', 'database', 'general']);

        $rules = [
            'reqDate' => 'required|max_length[100]|min_length[2]',
            'payee' => 'required|max_length[100]|min_length[2]',
            'address' => 'required|min_length[1]',
            'amount' => 'required|min_length[1]',
            'amountInWords' => 'required|min_length[1]',
            'sportNameAndCode'  => 'required|max_length[100]|min_length[2]',
            'firstVote'  => 'required|max_length[100]|min_length[2]',
            'availableBalance'  => 'required|max_length[100]|min_length[2]',
            'confirmation'  => 'required|max_length[100]|min_length[2]',
            'detailsOfRequest'  => 'required|max_length[100]|min_length[2]',
            'firstApplicantName'  => 'required|max_length[100]|min_length[2]',
            'firstStudentNumber'  => 'required|max_length[100]|min_length[2]',
            'firstCapacity'  => 'required|max_length[100]|min_length[2]',
            'firstSignature'  => 'required|min_length[2]',
            'secondApplicantName'  => 'required|max_length[100]|min_length[2]',
            'secondStudentNumber'  => 'required|max_length[100]|min_length[2]',
            'secondCapacity'  => 'required|max_length[100]|min_length[2]',
            'secondSignature'  => 'required|min_length[2]',
            'sportUnoinTreasure'  => 'required|min_length[2]',
            'sportUnoinTreasureDate'  => 'required|max_length[100]|min_length[2]',
            'sportUnionPresident'  => 'required|max_length[100]|min_length[2]',
            'sportUnoinPresidentDate'  => 'required|max_length[100]|min_length[2]',
            'srcTreasure'  => 'required|max_length[100]|min_length[2]',
            'srcTreasureDate'  => 'required|max_length[100]|min_length[2]',
            'srcPresident'  => 'required|max_length[100]|min_length[2]',
            'srcPresidentDate'  => 'required|max_length[100]|min_length[2]',
            'certifiedCorrect'  => 'required|max_length[100]|min_length[2]',
            'certifiedDate'  => 'required|max_length[100]|min_length[2]',
            'financeAmount'  => 'required|max_length[100]|min_length[2]',
            'financeVote'  => 'required|max_length[100]|min_length[2]',
            'financeApproved'  => 'required|max_length[100]|min_length[2]',
            'financeDate'  => 'required|max_length[100]|min_length[2]',

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'reqDate' => $this->request->getVar('reqDate'),
                'payee' => $this->request->getVar('payee'),
                'address' => $this->request->getVar('address'),
                'amount' => $this->request->getVar('amount'),
                'amountInWords' => $this->request->getVar('amountInWords'),
                'sportNameAndCode'  => $this->request->getVar('sportNameAndCode'),
                'firstVote'  => $this->request->getVar('firstVote'),
                'availableBalance'  => $this->request->getVar('availableBalance'),
                'confirmation'  => $this->request->getVar('confirmation'),
                'detailsOfRequest'  => $this->request->getVar('detailsOfRequest'),
                'firstApplicantName'  => $this->request->getVar('firstApplicantName'),
                'firstStudentNumber'  => $this->request->getVar('firstStudentNumber'),
                'firstCapacity'  => $this->request->getVar('firstCapacity'),
                'firstSignature'  => $this->request->getVar('firstSignature'),
                'secondApplicantName'  => $this->request->getVar('secondApplicantName'),
                'secondStudentNumber'  => $this->request->getVar('secondStudentNumber'),
                'secondCapacity'  => $this->request->getVar('secondCapacity'),
                'secondSignature'  => $this->request->getVar('secondSignature'),
                'sportUnoinTreasure'  => $this->request->getVar('sportUnoinTreasure'),
                'sportUnoinTreasureDate'  => $this->request->getVar('sportUnoinTreasureDate'),
                'sportUnionPresident'  => $this->request->getVar('sportUnionPresident'),
                'sportUnoinPresidentDate'  => $this->request->getVar('sportUnoinPresidentDate'),
                'srcTreasure'  => $this->request->getVar('srcTreasure'),
                'srcTreasureDate'  => $this->request->getVar('srcTreasureDate'),
                'srcPresident'  => $this->request->getVar('srcPresident'),
                'srcPresidentDate'  => $this->request->getVar('srcPresidentDate'),
                'certifiedCorrect'  => $this->request->getVar('certifiedCorrect'),
                'certifiedDate'  => $this->request->getVar('certifiedDate'),
                'financeAmount'  => $this->request->getVar('financeAmount'),
                'financeVote'  => $this->request->getVar('financeVote'),
                'financeApproved'  => $this->request->getVar('financeApproved'),
                'financeDate'  => $this->request->getVar('financeDate'),

                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];


            $model = new requisitionModel();
            $requisitionID = $model->insert($data);


            $data['requisitionID'] = $requisitionID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Added';
            return $this->respondCreated($output);
        }
    }
    public function update()
    {
        helper(['form', 'database', 'general']);

        $rules = [
            'reqDate' => 'required|max_length[100]|min_length[2]',
            'payee' => 'required|max_length[100]|min_length[2]',
            'address' => 'required|min_length[1]',
            'amount' => 'required|min_length[1]',
            'amountInWords' => 'required|min_length[1]',
            'sportNameAndCode'  => 'required|max_length[100]|min_length[2]',
            'firstVote'  => 'required|max_length[100]|min_length[2]',
            'availableBalance'  => 'required|max_length[100]|min_length[2]',
            'confirmation'  => 'required|max_length[100]|min_length[2]',
            'detailsOfRequest'  => 'required|max_length[100]|min_length[2]',
            'firstApplicantName'  => 'required|max_length[100]|min_length[2]',
            'firstStudentNumber'  => 'required|max_length[100]|min_length[2]',
            'firstCapacity'  => 'required|max_length[100]|min_length[2]',

            'secondApplicantName'  => 'required|max_length[100]|min_length[2]',
            'secondStudentNumber'  => 'required|max_length[100]|min_length[2]',
            'secondCapacity'  => 'required|max_length[100]|min_length[2]',

            'sportUnoinTreasure'  => 'required|min_length[2]',
            'sportUnoinTreasureDate'  => 'required|max_length[100]|min_length[2]',
            'sportUnionPresident'  => 'required|max_length[100]|min_length[2]',
            'sportUnoinPresidentDate'  => 'required|max_length[100]|min_length[2]',
            'srcTreasure'  => 'required|max_length[100]|min_length[2]',
            'srcTreasureDate'  => 'required|max_length[100]|min_length[2]',
            'srcPresident'  => 'required|max_length[100]|min_length[2]',
            'srcPresidentDate'  => 'required|max_length[100]|min_length[2]',
            'certifiedCorrect'  => 'required|max_length[100]|min_length[2]',
            'certifiedDate'  => 'required|max_length[100]|min_length[2]',
            'financeAmount'  => 'required|max_length[100]|min_length[2]',
            'financeVote'  => 'required|max_length[100]|min_length[2]',
            'financeApproved'  => 'required|max_length[100]|min_length[2]',
            'financeDate'  => 'required|max_length[100]|min_length[2]',

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [

                'reqDate' => $this->request->getVar('reqDate'),
                'payee' => $this->request->getVar('payee'),
                'address' => $this->request->getVar('address'),
                'amount' => $this->request->getVar('amount'),
                'amountInWords' => $this->request->getVar('amountInWords'),
                'sportNameAndCode'  => $this->request->getVar('sportNameAndCode'),
                'firstVote'  => $this->request->getVar('firstVote'),
                'availableBalance'  => $this->request->getVar('availableBalance'),
                'confirmation'  => $this->request->getVar('confirmation'),
                'detailsOfRequest'  => $this->request->getVar('detailsOfRequest'),
                'firstApplicantName'  => $this->request->getVar('firstApplicantName'),
                'firstStudentNumber'  => $this->request->getVar('firstStudentNumber'),
                'firstCapacity'  => $this->request->getVar('firstCapacity'),
                'firstSignature'  => $this->request->getVar('firstSignature'),
                'secondApplicantName'  => $this->request->getVar('secondApplicantName'),
                'secondStudentNumber'  => $this->request->getVar('secondStudentNumber'),
                'secondCapacity'  => $this->request->getVar('secondCapacity'),
                'secondSignature'  => $this->request->getVar('secondSignature'),
                'sportUnoinTreasure'  => $this->request->getVar('sportUnoinTreasure'),
                'sportUnoinTreasureDate'  => $this->request->getVar('sportUnoinTreasureDate'),
                'sportUnionPresident'  => $this->request->getVar('sportUnionPresident'),
                'sportUnoinPresidentDate'  => $this->request->getVar('sportUnoinPresidentDate'),
                'srcTreasure'  => $this->request->getVar('srcTreasure'),
                'srcTreasureDate'  => $this->request->getVar('srcTreasureDate'),
                'srcPresident'  => $this->request->getVar('srcPresident'),
                'srcPresidentDate'  => $this->request->getVar('srcPresidentDate'),
                'certifiedCorrect'  => $this->request->getVar('certifiedCorrect'),
                'certifiedDate'  => $this->request->getVar('certifiedDate'),
                'financeAmount'  => $this->request->getVar('financeAmount'),
                'financeVote'  => $this->request->getVar('financeVote'),
                'financeApproved'  => $this->request->getVar('financeApproved'),
                'financeDate'  => $this->request->getVar('financeDate'),

                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];


            $model = new requisitionModel();
            $requisitionID = $model->update($this->request->getVar('reqID'), $data);


            $data['requisitionID'] = $requisitionID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Updated';
            return $this->respondCreated($output);
        }
    }
    public function delete()
    {
        helper(['form', 'database', 'general']);

        $rules = [


            'reqID' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'The ID of the requisition is missing.'
                ]
            ],

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'reqID' => $this->request->getVar('reqID'),

                'status' => 0,

            ];

            $model = new requisitionModel();
            $reqID = $model->save($data);


            $data['reqID'] = $reqID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successfully Deleted';
            return $this->respondCreated($output);
        }
    }
}
