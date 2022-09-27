<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\studentModel;


class Student extends BaseController
{
    protected $modelName = 'App\Models\studentModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new studentModel();
        $students = $model->findAll();
        $output = array(
            'draw' => $draw,
            'recordsTotal' => count($students),
            'recordsFiltered' => count($students),
            'data' => $students
        );

        return $this->respond($output);
    }

    public function create()
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





        if (total_rows('student', ['studentNumber' => $this->request->getVar('studentNumber'), 'status' => 1]) > 0) {
            $output['message'] = 'This student is already in the system.';
            $output['error'] = true;
            return $this->respond($output);
        }

        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'sportID' => $this->request->getVar('studentSport'),
                'studentFirstname' => $this->request->getVar('studentFirstname'),
                'studentSurname' => $this->request->getVar('studentSurname'),
                'studentNumber' => $this->request->getVar('studentNumber'),
                'studentCell' => $this->request->getVar('studentCell'),
                'studentGender' => $this->request->getVar('studentGender'),
                'studentEmail' => $this->request->getVar('studentEmail'),
                'studentAddress' => $this->request->getVar('studentAddress'),
                'studentDob' => $this->request->getVar('studentDob'),
                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];


            $model = new studentModel();
            $studentID = $model->insert($data);

            $file = $this->request->getFile('profilePhoto');

            if ($file)
                if ($file->isValid()) {

                    $file->move('../assets/uploads/student/');
                    $pic = $file->getName();
                    $db      = \Config\Database::connect();
                    $builder2 = $db->table('studentfiles');
                    $builder2->insert(array(
                        'name' => $pic,
                        'title' => 'profile Pic',
                        'created_date' => date('Y-m-d H:i:s'),
                        'rel_id' => $studentID,
                        'rel' => 'student'
                    ));
                }



            $data['studentID'] = $studentID;
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


            $model = new studentModel();
            $studentID = $model->save($data);

            $file = $this->request->getFile('profilePhoto');

            if ($file)
                if ($file->isValid()) {

                    $file->move('../assets/uploads/student/');
                    $pic = $file->getName();
                    $db      = \Config\Database::connect();
                    $builder2 = $db->table('studentfiles');
                    $builder2->insert(array(
                        'name' => $pic,
                        'title' => 'profile Pic',
                        'created_date' => date('Y-m-d H:i:s'),
                        'rel_id' => $studentID,
                        'rel' => 'student'
                    ));
                }



            $data['studentID'] = $studentID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Added';
            return $this->respondCreated($output);
        }
    }
}
