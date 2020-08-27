<?php

class Session extends CIF_Controller {

    public $layout = 'full';
    public $module = 'session';
    public $model = 'Sessions_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
    }

    public function index($permalink) {
        $data = array();
        if (!$permalink)
            show_404();
        $this->db->where('permalink', $permalink)->set("visited", "visited + 1", FALSE)->update('sessions');
        $this->{$this->model}->custom_select = 'sessions.*, categories.title as category';
        $this->{$this->model}->joins = array(
            'categories' => array('sessions.category_id = categories.category_id', 'inner')
        );

        $this->{$this->model}->permalink = $permalink;
        $data['item'] = $this->{$this->model}->get()[0];

        if (!$data['item'])
            show_404();
        
        config('meta_keywords', $data['item']->meta_keywords);
        config('meta_description', $data['item']->meta_description);
        $this->load->view($this->module, $data);
    }

}
