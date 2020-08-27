<?php

class Sessions extends CIF_Controller {

    public $layout = 'full';
    public $module = 'sessions';
    public $model = 'Sessions_model';

    public function __construct() {
        parent::__construct();
        $this->load->model($this->model);
        $this->_primary_key = $this->{$this->model}->_primary_keys[0];
        $this->permission();
    }

    public function index() {
        $this->{$this->model}->custom_select = 'sessions.*, categories.title as category';
        $this->{$this->model}->joins = array(
            'categories' => array('categories.category_id = sessions.category_id', 'inner')
        );

        $data['items'] = $this->{$this->model}->get();
        $this->load->view($this->module . '/index', $data);
    }

    public function manage($id = null) {
        $data = array();

        if ($id) {
            $this->{$this->model}->{$this->_primary_key} = $id;
            $data['item'] = $this->{$this->model}->get();
            if (!$data['item'])
                show_404();
        } else {
            $data['item'] = new Std();
        }
        
        $this->load->library("form_validation");
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules("permalink", 'Permalink', "trim|required|callback_check");
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules("video_link", 'Video Link', "trim");
        $this->form_validation->set_rules("image", 'Session Image', "trim|callback_image[$id]");
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim');

        if ($this->form_validation->run() == FALSE)
            $this->load->view($this->module . '/manage', $data);

        else {
            $this->{$this->model}->title = $this->input->post('title');
            $this->{$this->model}->category_id = $this->input->post('category_id');
            $this->{$this->model}->description = $this->input->post('description');
            $this->{$this->model}->video_link = $this->input->post('video_link');
            $this->{$this->model}->permalink = $this->input->post('permalink');
            $this->{$this->model}->meta_keywords = $this->input->post('meta_keywords');
            $this->{$this->model}->meta_description = $this->input->post('meta_description');
            $this->{$this->model}->gallery = json_encode($_POST["gallery"]);
            
            $this->{$this->model}->save();
            
            redirect('admin/' . $this->module);
        }
    }

    public function delete($id = null) {
        if (!$id)
            show_404();
        $this->{$this->model}->{$this->_primary_key} = $id;
        $data['item'] = $this->{$this->model}->get();
        if (!$data['item'])
            show_404();
        $this->{$this->model}->delete();
        redirect('admin/' . $this->module);
    }

    public function image($var, $id) {
        $config['upload_path'] = './cdn/sessions/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
//            $this->{$this->model}->image = $this->input->post('image');
        } else {
            $data = $this->upload->data();
            if ($data['file_name'])
                $this->{$this->model}->image = $data['file_name'];
        }
        return true;
    }

    public function check() {
        $this->form_validation->set_message('check', "This value must be unique");
        if ($this->uri->segment('4')) {
            $this->db->where('session_id !=', $this->uri->segment('4'));
        }
        if ($this->db->where('permalink', $this->input->post('permalink'))->get('sessions')->row())
            return false;
        else
            return true;
    }

    public function image_upload() {
        $config['upload_path'] = './cdn/' . $this->module;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $errors = 0;
        $error_message = '';
        $passed_files = [];
        $var = 'file';
        $files = $this->reArrayFiles(@$_FILES[$var]);
        foreach($files as $idx => $file){
            $_FILES[$var] = $files[$idx];
            if ($this->upload->do_upload($var)) {
                $data = $this->upload->data();
                if ($data['file_name']){
                    $ext = pathinfo($data['file_name'],PATHINFO_EXTENSION);
                    $file_name = "marophotography_".str_replace(["."," "],"",microtime()).rand(0,100)."_orig.".$ext;
                    rename($data["full_path"], $data["file_path"].$file_name);
                    $passed_files[] = $file_name;
                }
            } else {
                $errors++;
                $error_message .= strip_tags($this->upload->display_errors());
            }
        }
        if($passed_files && count($passed_files))
        $this->uploadFile[$var] = ($passed_files);
        
        if ($errors == count($files))
            die( json_encode(["error"=> true, "message"=> $error_message]));
        else
            die( json_encode(["error"=> false, "files"=> $passed_files]));    
    }

    public function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for($i=0;$i<$file_count;$i++)
        {
            foreach($file_key as $val)
            {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }
        return $file_ary;
    }
}
