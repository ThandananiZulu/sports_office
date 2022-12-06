<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\inventoryModel;

class Inventory extends BaseController
{
    protected $modelName = 'App\Models\inventoryModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new inventoryModel();
        $students = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('inventory');
        $builder->select('*');
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
            'stockName' => 'required|max_length[100]|min_length[2]',
            'stockCode' => 'required|max_length[100]|min_length[2]',
            'stockPrice' => 'required|min_length[1]',
            'comments' => 'required|min_length[1]',
            'stockImage' => 'uploaded[stockImage]',
            'stockQuantity' => 'required|min_length[1]',

        ];





        if (total_rows('inventory', ['stockCode' => $this->request->getVar('stockCode'), 'status' => 1]) > 0) {
            $output['message'] = 'This Item is already in the system.';
            $output['error'] = true;
            return $this->respond($output);
        }

        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'stockName' => $this->request->getVar('stockName'),
                'stockCode' => $this->request->getVar('stockCode'),
                'stockPrice' => $this->request->getVar('stockPrice'),
                'comments' => $this->request->getVar('comments'),
                'stockQuantity' => $this->request->getVar('stockQuantity'),

                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];
            $stockImage = $this->request->getFile('stockImage');
            if ($stockImage)
                if ($stockImage->isValid()) {

                    $stockImage->move('../assets/uploads/inventory/');
                    $pic = $stockImage->getName();
                    $data["stockImage"] = $pic;
                }


            $model = new inventoryModel();
            $studentID = $model->insert($data);




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
            'stockName' => 'required|max_length[100]|min_length[2]',
            'stockCode' => 'required|max_length[100]|min_length[2]',
            'stockPrice' => 'required|min_length[1]',
            'comments' => 'required|min_length[1]',
            'stockImage' => 'uploaded[stockImage]',
            'stockQuantity' => 'required|min_length[1]',

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'stockID' => $this->request->getVar('stockID'),
                'stockName' => $this->request->getVar('stockName'),
                'stockCode' => $this->request->getVar('stockCode'),
                'stockPrice' => $this->request->getVar('stockPrice'),
                'comments' => $this->request->getVar('comments'),
                'stockQuantity' => $this->request->getVar('stockQuantity'),

                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];
            $stockImage = $this->request->getFile('stockImage');
            if ($stockImage)
                if ($stockImage->isValid()) {

                    $stockImage->move('../assets/uploads/inventory/');
                    $pic = $stockImage->getName();
                    $data["stockImage"] = $pic;
                }


            $model = new inventoryModel();
            $studentID = $model->save($data);




            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Updated';
            return $this->respondCreated($output);
        }
    }

    public function minus()
    {
        helper(['form', 'database', 'general']);

        $quan = $this->request->getVar('stockQuantity');
        $stock = $this->request->getVar('stockID');

        minusQuan($quan, $stock);


        $output['error'] = false;
        $output['message'] = 'Successful Removed';
        return $this->respondCreated($output);
    }
    public function plus()
    {
        helper(['form', 'database', 'general']);

        $quan = $this->request->getVar('stockQuantity');
        $stock = $this->request->getVar('stockID');

        plusQuan($quan, $stock);


        $output['error'] = false;
        $output['message'] = 'Successful Added';
        return $this->respondCreated($output);
    }
    public function delete()
    {
        helper(['form', 'database', 'general']);

        $rules = [


            'stockID' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'The ID of the item is missing.'
                ]
            ],

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'stockID' => $this->request->getVar('stockID'),

                'status' => 0,

            ];

            $model = new inventoryModel();
            $inventoryID = $model->save($data);


            $data['inventoryID'] = $inventoryID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successfully Deleted';
            return $this->respondCreated($output);
        }
    }
}
