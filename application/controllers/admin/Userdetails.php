<?php

// status 0-inactive, 1-active, 2-add, 3-modify, 4-delete
// 5-add authorized, 6-modify authoized, 7-delete authorized , 8- death informed

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userdetails extends CIF_Controller {

    public $layout = 'full';
    public $module = 'userdetails';
    public $model = 'Details_model';
    
    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission();
    }

    public function index() {
        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module.'/index', $data);
    }

    public function getDetails() {
        $data = array();
        
        $sql="select ud.* ,".' concat( CONCAT(\'<a href="userdetails/manage/\',ud.id,\'" class="btn btn-lime btn-rounded">
        <i class="fa fa-pencil" aria-hidden="true"></i>
        Form
    </a>\') ) as operation'." from user_details ud where " .$this->input->post('where')
        ." order by risk DESC, createdDate DESC";
        $data=$this->db->query($sql)->result();
       
        $recordsTotal = count($data);
        $recordsFiltered = $recordsTotal;
        
        $json = json_encode(array(
            "draw" => isset($iDraw) ? $iDraw : 1,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data)
            );

        echo $json; 
        exit();
    }

    public function manage($id = NULL) {
        $data = array();
         
        if ($id) {
			$this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();

            if (!$data['item'])
                show_404();      

            $this->load->view($this->module . '/manage', $data);
        }

    }

    public function delete($id = null) {
        if (!$id)
            show_404();

        $this->db->where('id', $id);
        $this->db->delete('user_details'); 

        $this->{$this->model}->{$this->_primary_key} = $id;
        $data['item'] = $this->{$this->model}->get();
        if (!$data['item'])
            show_404();
        $this->{$this->model}->delete();        

        redirect('admin/' . $this->module);
    }
     
    public function exportcsv(){
        $data = array();
        $where = "1=1 ";
        $phone = $this->input->post('phoneNo');
        $from = $this->input->post('rom');
        $to = $this->input->post('to');

        if($phone != null || $phone !='')
            $where += " and phoneNo=".$phone;
        if($from != null || $from !='')
            $where += " and createdDate >=".$from;
        if($to != null || $to !='')
            $where += " and createdDate <=".$to;
        
        $sql="select ud.* from user_details ud where " .$where
        ." order by risk DESC, createdDate DESC";
        $data=$this->db->query($sql)->result();
       
        $recordsTotal = count($data);
        $recordsFiltered = $recordsTotal;
        
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample.csv"');        

        $fp = fopen('php://output', 'wb');
        foreach ($data as $line) {
            fputcsv($fp, $line, ',');
        }
        fclose($fp);
    }

}
