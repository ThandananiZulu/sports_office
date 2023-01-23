<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\chatModel;



class Chat extends BaseController
{
    protected $modelName = 'App\Models\chatModel';
    protected $format = 'json';

    use ResponseTrait;

    public function index()
    {
        helper(['form', 'database', 'general']);

        $session = session();
        $staff = $session->get('staff');

        $draw = intval($this->request->getVar("draw"));
        $start = intval($this->request->getVar("start"));
        $length = intval($this->request->getVar("length"));

        $reciever = $this->request->getVar("reciever");
        $arrayTwo = array($reciever, $staff->staffNumber);
        $array = array($staff->staffNumber, $reciever);
        $db = \Config\Database::connect();
        $builder = $db->table('chats');
        $builder->select('*');
        $builder->whereIn("sender", $array);
        $builder->whereIn("reciever", $arrayTwo);

        $data = $builder->get()->getResult();


        if ($data) {
            $chat = '';

            foreach ($data as $row) {
                $time = strtotime($row->time);

                $getMinute = date('H:i', $time);
                if ($row->sender == $staff->staffNumber) {
                    $chat .= '<div class="mine messages"><div class="message"><h6><div class="text-white smallFont removeMargin float-right mt-2 ml-2">' . $getMinute . '</div>' . $row->message . '</h6></div></div>';
                } else {
                    $chat .= '<div class="yours messages"><div class="message"><h6><div class="text-white smallFont removeMargin float-right mt-2 ml-2">' . $getMinute . '</div>' . $row->message . '</h6></div></div></div>';
                }
            }
        } else {
            $output['info'] = $data;

            $output['error'] = true;
            $output['message'] = 'No messages found';
            return $this->respondCreated($output);
        }
        $output = array(

            'draw' => $draw,
            'recordsTotal' => count($data),

        );
        $output['info'] = $data;
        $output['data'] = $chat;
        $output['error'] = false;
        $output['message'] = 'Successful Added';
        return $this->respondCreated($output);
    }

    public function create()
    {
        helper(['form', 'database', 'general']);

        $data = [
            'message' => $this->request->getVar('message'),
            'sender' => $this->request->getVar('sender'),
            'reciever' => $this->request->getVar('reciever'),
        ];

        $model = new chatModel();
        $noticeboardID = $model->insert($data);


        $output['data'] = $data;
        $output['error'] = false;
        $output['message'] = 'Successful saved';
        return $this->respondCreated($output);
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

            $model = new chatModel();
            $noticeboardID = $model->save($data);








            $data['noticeboardID'] = $noticeboardID;
            $output['data'] = $data;
            $output['error'] = false;
            $output['message'] = 'Successfully Updated';
            return $this->respondCreated($output);
        }
    }


    public function fetchAllUsers()
    {
        helper(['form', 'database', 'general']);

        $session = session();
        $staff = $session->get('staff');

        $db = \Config\Database::connect();
        $builder = $db->table('staff');
        $builder->join('stafffiles', 'staff.staffID = stafffiles.rel_id', 'left');
        $builder->select('staff.*,stafffiles.rel, stafffiles.title, stafffiles.name as name');
        $builder->where('staff.staffNumber !=', $staff->staffNumber);

        $query = $builder->get();
        $data = $query->getResult();

        $user = "";
        foreach ($data as $row) {
            $user .=  '<li style="cursor:pointer" onclick="showChats(' . $row->staffNumber . ')" class="list-group-item "><div class="row"><div class="col-md-2">' .
                '<img src="' . base_url() . '/assets/uploads/staff/' . $row->name . '" class="rounded-circle" width="40px" height="40px" alt="" style="margin-top:1px" />' .
                ' </div><div class="col-md-10"><div class="d-flex justify-content-between">' .
                '<div class="fw-bold">'  . $row->staffFirstname . ' ' . $row->staffSurname . '</div>' .
                '</div> <div class="d-flex justify-content-between"> <small></small><small class="text-muted"></small>' .
                '</div></div> </div></li>';
        }
        $output['data'] = $user;
        $output['error'] = false;
        $output['message'] = 'Successful';
        return $this->respond($output);
    }
}
