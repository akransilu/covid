<?php

class Home extends CIF_Controller {

    public $layout = 'full';
    public $module = 'home';
    public $model = 'Details_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
    }

    public function index() {
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module, $data);
    }

    public function save() {
        $traveled = $this->input->post('traveledRecently');
        $covidContact = $this->input->post('covidContact');
        $symptoms = $this->input->post('symptoms');
        $risk = 0;

        $this->load->library("form_validation");
        $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');

        // $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('email', 'Email Adderess', 'required');
        $this->form_validation->set_rules('phoneNo', 'Phone Number', 'required');

        if ($traveled === 'Yes'){
            $this->form_validation->set_rules('returnedFrom', 'Recently trveled from', 'required');
            $this->form_validation->set_rules('returnedDate', 'Returned date', 'required');

        }
       
        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module , $data);

        else {

            $this->{$this->model}->fName = $this->input->post('firstName');
            $this->{$this->model}->lName = $this->input->post('lastName');
            $this->{$this->model}->company = $this->input->post('company');
            $this->{$this->model}->email = $this->input->post('email');
            $this->{$this->model}->phoneNo = $this->input->post('phoneNo');
            $this->{$this->model}->traveledRecently = $traveled;

            if ($traveled === 'Yes'){
                $this->{$this->model}->returnedFrom = $this->input->post('returnedFrom');
                $this->{$this->model}->returnedDate = $this->input->post('returnedDate');
                $risk++;
            }

            if ($covidContact === 'Yes'){
                $risk++;
            }

            if ($symptoms === 'Yes'){
                $risk++;
            }

            $this->{$this->model}->covidContact = $covidContact;
            $this->{$this->model}->symptoms = $symptoms;
            $this->{$this->model}->risk = $risk;
            $this->{$this->model}->save();

            // $this->load->view($this->module, $data);
            $this->session->set_flashdata('message', 'Form submitted successfully.');
            redirect("/");

        }
        // die( json_encode(["error"=> false, "files"=> $passed_files]));
        
    }

}
