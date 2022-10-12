<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\noticeboardModel;
use App\Models\noticeboardFilesModel;


class Noticeboard extends BaseController
{
    protected $modelName = 'App\Models\studentModel';
    protected $models = 'App\Models\studentFilesModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new noticeboardModel();
        $notice = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('noticeboard');
        $builder->select('*');

        $data = $builder->get()->getResult();

        if ($data) {
            $cards = '';

            foreach ($data as $row) {
                $cards .= ' <div class="cards" data-firstImage="' . $row->firstImage . '" data-secondImage="' . $row->secondImage . '" data-thirdImage="' . $row->thirdImage . '" style="cursor: pointer" onclick="showDetailed(this)">
            <div class="card-images">
                <img class="card-img-top" src="' . base_url() . '/assets/uploads/noticeboard/' . $row->firstImage . '" alt="Card image cap">
            </div>
            <div class=" card-infos">
                <h3 class="">' . $row->title . '</h3>
                <p class="">' . $row->description . '</p> </div></div>';
            }
        } else {
            $output['error'] = true;
            $output['message'] = 'Could not fetch notices';
            return $this->respondCreated($output);
        }
        $output = array(

            'draw' => $draw,
            'recordsTotal' => count($notice),

        );
        $output['data'] = $cards;
        $output['error'] = false;
        $output['message'] = 'Successful Added';
        return $this->respondCreated($output);
    }

    public function create()
    {
        helper(['form', 'database', 'general']);

        $rules = [
            'description' => 'required|max_length[100]|min_length[2]',
            'title' => 'required|max_length[100]|min_length[2]',

            'firstImage' => [
                'rules'  => 'uploaded[firstImage]',
                'label' => 'The first image',
            ],

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),

                'status' => 1,
                'createdAt' => date('Y-m-d H:i:s')
            ];
            $firstImagefile = $this->request->getFile('firstImage');
            if ($firstImagefile)
                if ($firstImagefile->isValid()) {

                    $firstImagefile->move('../assets/uploads/noticeboard/');
                    $pic = $firstImagefile->getName();
                    $data["firstImage"] = $pic;
                }

            $secondImagefile = $this->request->getFile('secondImage');
            if ($secondImagefile)
                if ($secondImagefile->isValid()) {

                    $secondImagefile->move('../assets/uploads/noticeboard/');
                    $pic = $secondImagefile->getName();
                    $data["secondImage"] = $pic;
                }

            $thirdImagefile = $this->request->getFile('thirdImage');
            if ($thirdImagefile)
                if ($thirdImagefile->isValid()) {

                    $thirdImagefile->move('../assets/uploads/noticeboard/');
                    $pic = $thirdImagefile->getName();
                    $data["thirdImage"] = $pic;
                }

            $model = new noticeboardModel();
            $noticeboardID = $model->insert($data);








            $data['noticeboardID'] = $noticeboardID;
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


            $model = new noticeboardModel();
            $studentID = $model->update($this->request->getVar('studentID'), $data);

            // if files"name" is empty , dont insert/update

            $file = $this->request->getFile('profilePhoto');
            $filesid = $this->request->getVar('filesid');
            if ($file)
                if ($file->isValid()) {

                    $models = new noticeboardModel();

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
