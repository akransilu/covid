<?php

// status 0-inactive, 1-active, 2-add, 3-modify, 4-delete
// 5-add authorized, 6-modify authoized, 7-delete authorized , 8- death informed

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mcq extends CIF_Controller {

    public $layout = 'full';
    public $module = 'mcq';
    public $model = 'Exam_model';
    public $result_model = 'Result_model';
    public $mcq_model = 'Mcq_question_model';
    
    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->load->model($this->mcq_model);
        $this->load->model($this->result_model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission();
    }

    public function index() {
        $apct_status = 1;
        // if (session('role') === 'Admin')
        //     $apct_status = 8;
        $this->db->select('*');
        $this->db->from('exam');
        $this->db->where('status',$apct_status);
        $data['items'] = $this->db->get()->result();
        $this->load->view($this->module . '/index', $data);
    }

    public function complete() {
        //get user id from session        
        $student_id = 15;//session('user_id');

        $this->{$this->result_model}->total_marks = $this->input->post('total_marks');
        $this->{$this->result_model}->percentage = $this->input->post('percentage');
        $this->{$this->result_model}->student_id = $student_id;
        $this->{$this->result_model}->exam_id = $this->input->post('exam_id');
        $this->{$this->result_model}->save();

        // die( json_encode(["error"=> false, "files"=> $passed_files]));
        // $this->load->view($this->module . '/index', $data);

        
        // $this->load->view($this->module . '/result', $data);
    }

    public function resultremove() {
        // $this->{$this->model}->exam_name 
        $examid = $this->input->post('exam_id');

        // $examid = $this->{$this->model}->save();

        // $apct_status = 1;
        // if (session('role') === 'Admin')
        //     $apct_status = 8;
        $this->db->select('*');
        $this->db->from('mcq_question');
        $this->db->where('exam_id',$examid);
        $items = $this->db->get()->result();

        $marks = 0;
        foreach ($items as $item) {           

            $ans_provide = $this->input->post('answer-'.$item->question_id);

            if($item->question_id == $ans_provide){
                ++$marks;
            }

            // $this->{$this->mcq_model}->question_id = $item->question_id;
            // $this->{$this->mcq_model}->question_no = $this->input->post('question_no-'.$item->question_id);
            // $this->{$this->mcq_model}->answer_no = $this->input->post('answer_no-'.$item->question_id);
            // $question_id = $this->{$this->mcq_model}->save();

        }


        $percent = ($marks/count($items))*100;
        $this->{$this->model}->time_restriction = $time_rest;

        $this->{$this->result_model}->total_marks = $marks;
        $this->{$this->result_model}->percentage = $percent;


        $this->{$this->result_model}->student_id = $this->input->post('student_id');
        $this->{$this->result_model}->exam_id = $examid;
        $this->{$this->result_model}->save();

        // die( json_encode(["error"=> false, "files"=> $passed_files]));
        // $this->load->view($this->module . '/index', $data);

        
        $this->load->view($this->module . '/result', $data);
    }

    public function start($examid = FALSE) {
        $data = array();

        if ($examid) {
            // $apct_status = 1;
            // if (session('role') === 'Admin')
            //     $apct_status = 8;

            $this->db->select('*');
            $this->db->from('mcq_question');
            // $this->db->where('status',$apct_status);
            $this->db->where('exam_id',$examid);
            $this->db->order_by('question_no');
            $data['items'] = $this->db->get()->result();

            $this->{$this->model}->{$this->_primary_key} = $examid;
            $data['exam'] = $this->{$this->model}->get();
            // print_r($data);

        }
        $this->load->view($this->module . '/start', $data);
    }

    

}
