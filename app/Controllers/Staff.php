<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\staffModel;
use App\Models\staffFilesModel;


class Staff extends BaseController
{
    protected $modelName = 'App\Models\staffModel';
    protected $models = 'App\Models\staffFilesModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new staffModel();
        $staffs = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('staff');
        $builder->select('staff.*, stafffiles.name as picname,stafffiles.id as filesid');
        $builder->join('stafffiles', 'staff.staffId = stafffiles.rel_id', 'left');


        $data = $builder->get()->getResult();


        $output = array(
            'draw' => $draw,
            'recordsTotal' => count($staffs),
            'recordsFiltered' => count($staffs),
            'data' => $data
        );

        return $this->respond($output);
    }

    public function create()
    {
        helper(['form', 'database', 'general']);

        $rules = [
            'staffFirstname' => 'required|max_length[100]|min_length[2]',
            'staffSurname' => 'required|max_length[100]|min_length[2]',
            'staffRole' => 'required|max_length[100]|min_length[2]',
            'staffGender' => 'required|min_length[1]',
            'staffEmail' => 'required|min_length[1]',
            'staffCell' => 'required|min_length[1]',
            'staffNumber' => 'required|min_length[1]',


            'staffAddress' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ]
            ],
            'staffDob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Date of birth is required.'
                ]
            ]

        ];





        if (total_rows('staff', ['staffNumber' => $this->request->getVar('staffNumber'), 'status' => 1]) > 0) {
            $output['message'] = 'This staff member is already in the system.';
            $output['error'] = true;
            return $this->respond($output);
        }

        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'staffRole' => $this->request->getVar('staffRole'),
                'staffFirstname' => $this->request->getVar('staffFirstname'),
                'staffSurname' => $this->request->getVar('staffSurname'),
                'staffNumber' => $this->request->getVar('staffNumber'),
                'staffCell' => $this->request->getVar('staffCell'),
                'staffGender' => $this->request->getVar('staffGender'),
                'staffEmail' => $this->request->getVar('staffEmail'),
                'staffAddress' => $this->request->getVar('staffAddress'),
                'staffDob' => $this->request->getVar('staffDob'),
                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];


            $model = new staffModel();
            $db = \Config\Database::connect();
            $db->transStart();
            $staffID = $model->insert($data);
            set_user_details($this->request->getVar('staffEmail'), sha1("123456"));
            $db->transComplete();
            $file = $this->request->getFile('profilePhoto');

            if ($file)
                if ($file->isValid()) {

                    $file->move('../assets/uploads/staff/');
                    $pic = $file->getName();
                    $db      = \Config\Database::connect();
                    $builder2 = $db->table('stafffiles');
                    $builder2->insert(array(
                        'name' => $pic,
                        'title' => 'profile Pic',
                        'created_date' => date('Y-m-d H:i:s'),
                        'rel_id' => $staffID,
                        'rel' => 'staff'
                    ));
                }



            $data['staffID'] = $staffID;
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
            'staffFirstname' => 'required|max_length[100]|min_length[2]',
            'staffSurname' => 'required|max_length[100]|min_length[2]',
            'staffGender' => 'required|min_length[1]',
            'staffEmail' => 'required|min_length[1]',
            'staffCell' => 'required|min_length[1]',
            'staffNumber' => 'required|min_length[1]',
            'staffRole' => 'required|min_length[1]',
            'staffID' => 'required|min_length[1]',

            'staffAddress' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ]
            ],
            'staffDob' => [
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
                'staffID' => $this->request->getVar('staffID'),
                'staffRole' => $this->request->getVar('staffRole'),
                'staffFirstname' => $this->request->getVar('staffFirstname'),
                'staffSurname' => $this->request->getVar('staffSurname'),
                'staffNumber' => $this->request->getVar('staffNumber'),
                'staffCell' => $this->request->getVar('staffCell'),
                'staffGender' => $this->request->getVar('staffGender'),
                'staffEmail' => $this->request->getVar('staffEmail'),
                'staffAddress' => $this->request->getVar('staffAddress'),
                'staffDob' => $this->request->getVar('staffDob'),
                'status' => 1,
                'modifiedAt' => date('Y-m-d H:i:s')
            ];


            $model = new staffModel();
            $staffID = $model->update($this->request->getVar('staffID'), $data);

            // if files"name" is empty , dont insert/update

            $file = $this->request->getFile('profilePhoto');
            $filesid = $this->request->getVar('filesid');
            if ($file)
                if ($file->isValid()) {

                    $models = new staffFilesModel();

                    $file->move('../assets/uploads/staff/');

                    $row['id'] = $filesid;
                    $row['name'] = $file->getName();
                    if (total_rows('stafffiles', ['id' => $filesid]) <= 0) {
                        $models->insert(array(
                            'name' => $row['name'],
                            'title' => 'profile Pic',
                            'created_date' => date('Y-m-d H:i:s'),
                            'rel_id' => $this->request->getVar('staffID'),
                            'rel' => 'staff'
                        ));
                    } else {
                        $fileDesc = get_file_name($filesid);

                        $models->update($filesid, $row);

                        unlink(ROOTPATH . "assets\uploads\staff\\" . $fileDesc->name);
                    }
                }



            $data['staffID'] = $staffID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Added';
            return $this->respondCreated($output);
        }
    }
}
