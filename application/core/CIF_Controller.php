<?php

class CIF_Controller extends CI_Controller {

//    public $lang;
//    public $language;
    public $language_id;
    protected $module;
    protected $action;
    protected $hash;

    public function __construct() {
        parent::__construct();
        if (!session('visitor')) {
            session('visitor', 1);
            $this->db->where('key', 'visitors')->set('value', 'value+1', false)->update('settings');
        }

    }

    private function checkModuleStatus() {
        if (!$this->db->where('code', $this->module)->where('status', '1')->get('modules')->num_rows())
            error($this->module . " is not an active module");
    }

    protected function permission() {
        if (!session('user_id'))
            redirect('admin/login');
    }
    

    protected function companyPermission() {
        if (!session('company_id'))
            redirect('company/login');
    }

}
