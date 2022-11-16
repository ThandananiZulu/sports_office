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
        helper(['form', 'database', 'general']);

        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $model = new noticeboardModel();
        $notice = $model->findAll();
        $db = \Config\Database::connect();
        $builder = $db->table('noticeboard');
        $builder->select('*');
        $builder->where('status', 1);
        $data = $builder->get()->getResult();

        if ($data) {
            $cards = '';

            foreach ($data as $row) {
                $cards .= ' <div class="cards" id="cardID_' . $row->noticeID . '" data-noticeID="' . $row->noticeID . '" data-description="' . $row->description . '" data-title="' . $row->title . '" data-firstImage="' . $row->firstImage . '" data-secondImage="' . $row->secondImage . '" data-thirdImage="' . $row->thirdImage . '" style="cursor: pointer" onclick="showDetailed(this)">
            <div class="card-images">
                <img class="card-img-top" src="' . base_url() . '/assets/uploads/noticeboard/' . $row->firstImage . '" alt="Card image cap">
            </div>
            <div class=" card-infos">
                <h3 class="">' . $row->title . '</h3>
                <p class="">' . $row->description . '</p>   <p class="card-text"><small class="text-muted">Last updated ' . timeAgo($row->modifiedAt ? $row->modifiedAt : $row->createdAt) . '</small></p></div></div>';
            }
        } else {
            $output['error'] = true;
            $output['message'] = 'Could not fetch notices';
            return $this->respondCreated($output);
        }
        $output = array(

            'draw' => $draw,
            'recordsTotal' => count($data),

        );
        $output['info'] = $data;
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
            'description' => 'required|max_length[100]|min_length[2]',
            'title' => 'required|max_length[100]|min_length[2]',


            'noticeID' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'The ID of the post is missing.'
                ]
            ],

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'noticeID' => $this->request->getVar('noticeID'),
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),

                'status' => 1,
                'modifiedAt' => date('Y-m-d H:i:s')
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
            $noticeboardID = $model->save($data);








            $data['noticeboardID'] = $noticeboardID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successfully Updated';
            return $this->respondCreated($output);
        }
    }
    public function delete()
    {
        helper(['form', 'database', 'general']);

        $rules = [


            'noticeID' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'The ID of the post is missing.'
                ]
            ],

        ];


        if (!$this->validate($rules)) {

            return $this->fail($this->validator->getErrors());
        } else {
            $data = [
                'noticeID' => $this->request->getVar('noticeID'),

                'status' => 0,

            ];

            $model = new noticeboardModel();
            $noticeboardID = $model->save($data);


            $data['noticeboardID'] = $noticeboardID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successfully Deleted';
            return $this->respondCreated($output);
        }
    }
    public function timePast()
    {
        helper(['form', 'database', 'general']);

        $modifiedAt = $this->request->getVar('modifiedAt');
        $createdAt = $this->request->getVar('createdAt');

        $time = timeAgo($modifiedAt ? $modifiedAt : $createdAt);

        $output['data'] = $time;
        $output['error'] = false;
        $output['message'] = 'Successful';
        return $this->respondCreated($output);
    }
}
