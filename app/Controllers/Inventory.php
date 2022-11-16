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
            'studentFirstname' => 'required|max_length[100]|min_length[2]',
            'studentSurname' => 'required|max_length[100]|min_length[2]',
            'studentSport' => 'required|min_length[1]',
            'studentGender' => 'required|min_length[1]',
            'studentEmail' => 'required|min_length[1]',
            'studentCell' => 'required|min_length[1]',
            'studentNumber' => 'required|min_length[1]',
            'studentID' => 'required|min_length[1]',

            'studentAddress' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ]
            ],
            'studentDob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Date of birth is required.'
                ]
            ]

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'studentID' => $this->request->getVar('studentID'),
                'studentFirstname' => $this->request->getVar('studentFirstname'),
                'studentSurname' => $this->request->getVar('studentSurname'),
                'studentNumber' => $this->request->getVar('studentNumber'),
                'studentCell' => $this->request->getVar('studentCell'),
                'studentGender' => $this->request->getVar('studentGender'),
                'studentEmail' => $this->request->getVar('studentEmail'),
                'studentAddress' => $this->request->getVar('studentAddress'),
                'studentDob' => $this->request->getVar('studentDob'),
                'status' => 1,
                'modifiedAt' => date('Y-m-d H:i:s')
            ];


            $model = new inventoryModel();
            $studentID = $model->update($this->request->getVar('studentID'), $data);

            // if files"name" is empty , dont insert/update

            $file = $this->request->getFile('profilePhoto');
            $filesid = $this->request->getVar('filesid');
            if ($file)
                if ($file->isValid()) {

                    $models = new inventoryModel();

                    $file->move('../assets/uploads/student/');

                    $row['id'] = $filesid;
                    $row['name'] = $file->getName();
                    if (total_rows('studentfiles', ['id' => $filesid]) <= 0) {
                        $models->insert(array(
                            'name' => $row['name'],
                            'title' => 'profile Pic',
                            'created_date' => date('Y-m-d H:i:s'),
                            'rel_id' => $this->request->getVar('studentID'),
                            'rel' => 'student'
                        ));
                    } else {
                        $fileDesc = get_file_name($filesid);

                        $models->update($filesid, $row);

                        unlink(ROOTPATH . "assets\uploads\student\\" . $fileDesc->name);
                    }
                }



            $data['studentID'] = $studentID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Added';
            return $this->respondCreated($output);
        }
    }
}
