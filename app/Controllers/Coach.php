<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\coachModel;
use App\Models\coachFilesModel;


class Coach extends BaseController
{
    protected $modelName = 'App\Models\coachModel';
    protected $models = 'App\Models\coachFilesModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new coachModel();
        $coachs = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('coach');
        $builder->select('coach.*, coachfiles.name as picname,coachfiles.id as filesid,sport.sportName as sportName');
        $builder->join('coachfiles', 'coach.coachId = coachfiles.rel_id', 'left');
        $builder->join('sport', 'coach.sportID = sport.sportID');

        $data = $builder->get()->getResult();


        $output = array(
            'draw' => $draw,
            'recordsTotal' => count($coachs),
            'recordsFiltered' => count($coachs),
            'data' => $data
        );

        return $this->respond($output);
    }

    public function create()
    {
        helper(['form', 'database', 'general']);

        $rules = [
            'coachFirstname' => 'required|max_length[100]|min_length[2]',
            'coachSurname' => 'required|max_length[100]|min_length[2]',
            'coachSport' => 'required|min_length[1]',
            'coachGender' => 'required|min_length[1]',
            'coachEmail' => 'required|min_length[1]',
            'coachCell' => 'required|min_length[1]',
            'coachNumber' => 'required|min_length[1]',


            'coachAddress' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ]
            ],
            'coachDob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Date of birth is required.'
                ]
            ]

        ];





        if (total_rows('coach', ['coachNumber' => $this->request->getVar('coachNumber'), 'status' => 1]) > 0) {
            $output['message'] = 'This coach is already in the system.';
            $output['error'] = true;
            return $this->respond($output);
        }

        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'sportID' => $this->request->getVar('coachSport'),
                'coachFirstname' => $this->request->getVar('coachFirstname'),
                'coachSurname' => $this->request->getVar('coachSurname'),
                'coachNumber' => $this->request->getVar('coachNumber'),
                'coachCell' => $this->request->getVar('coachCell'),
                'coachGender' => $this->request->getVar('coachGender'),
                'coachEmail' => $this->request->getVar('coachEmail'),
                'coachAddress' => $this->request->getVar('coachAddress'),
                'coachDob' => $this->request->getVar('coachDob'),
                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];


            $model = new coachModel();
            $coachID = $model->insert($data);

            $file = $this->request->getFile('profilePhoto');

            if ($file)
                if ($file->isValid()) {

                    $file->move('../assets/uploads/coach/');
                    $pic = $file->getName();
                    $db      = \Config\Database::connect();
                    $builder2 = $db->table('coachfiles');
                    $builder2->insert(array(
                        'name' => $pic,
                        'title' => 'profile Pic',
                        'created_date' => date('Y-m-d H:i:s'),
                        'rel_id' => $coachID,
                        'rel' => 'coach'
                    ));
                }



            $data['coachID'] = $coachID;
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
            'coachFirstname' => 'required|max_length[100]|min_length[2]',
            'coachSurname' => 'required|max_length[100]|min_length[2]',
            'coachSport' => 'required|min_length[1]',
            'coachGender' => 'required|min_length[1]',
            'coachEmail' => 'required|min_length[1]',
            'coachCell' => 'required|min_length[1]',
            'coachNumber' => 'required|min_length[1]',
            'coachID' => 'required|min_length[1]',

            'coachAddress' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Address is required.'
                ]
            ],
            'coachDob' => [
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
                'coachID' => $this->request->getVar('coachID'),
                'coachFirstname' => $this->request->getVar('coachFirstname'),
                'coachSurname' => $this->request->getVar('coachSurname'),
                'coachNumber' => $this->request->getVar('coachNumber'),
                'coachCell' => $this->request->getVar('coachCell'),
                'coachGender' => $this->request->getVar('coachGender'),
                'coachEmail' => $this->request->getVar('coachEmail'),
                'coachAddress' => $this->request->getVar('coachAddress'),
                'coachDob' => $this->request->getVar('coachDob'),
                'status' => 1,
                'modifiedAt' => date('Y-m-d H:i:s')
            ];


            $model = new coachModel();
            $coachID = $model->update($this->request->getVar('coachID'), $data);

            // if files"name" is empty , dont insert/update

            $file = $this->request->getFile('profilePhoto');
            $filesid = $this->request->getVar('filesid');
            if ($file)
                if ($file->isValid()) {

                    $models = new coachFilesModel();

                    $file->move('../assets/uploads/coach/');

                    $row['id'] = $filesid;
                    $row['name'] = $file->getName();
                    if (total_rows('coachfiles', ['id' => $filesid]) <= 0) {
                        $models->insert(array(
                            'name' => $row['name'],
                            'title' => 'profile Pic',
                            'created_date' => date('Y-m-d H:i:s'),
                            'rel_id' => $this->request->getVar('coachID'),
                            'rel' => 'coach'
                        ));
                    } else {
                        $fileDesc = get_file_name($filesid);

                        $models->update($filesid, $row);

                        unlink(ROOTPATH . "assets\uploads\coach\\" . $fileDesc->name);
                    }
                }



            $data['coachID'] = $coachID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successful Added';
            return $this->respondCreated($output);
        }
    }
}
