<?php
    if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class UserRoleMapping extends CIF_Controller {
        public $layout = 'full';
        public $module = 'user_role_map';
        public $model = 'user_role_model';

        public function __construct() {
            parent::__construct();
            $this->load->model($this->model);
            $this->_primary_key = $this->{$this->model}->_primary_keys[0];
            $this->permission();
        }
    
        public function index() {
            $data['items'] = $this->{$this->model}->get();
            $this->load->view($this->module . '/index', $data);
        }
    }
?>