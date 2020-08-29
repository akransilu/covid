<?php

class Login extends CI_Controller {

    public function index() {
        $this->lang->load('users');
        $this->layout = 'ajax';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|callback_check');
        $this->form_validation->set_rules('password', 'lang:users_password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {
            $user = $this->db->where('email', $this->input->post('email'))->where('password', md5($this->input->post('password')))
            ->join('user_role', 'users.user_role_id = user_role.user_role_id')
            ->get('users')->row();

            $this->session->set_userdata(array(
                'email' => $user->email,
                'image' => $user->image,
                'user_id' => $user->user_id,
                'username' => $user->username,
                'role_id' => $user->user_role_id,
                'role' => $user->role,
            ));
            redirect('admin/userdetails');
        }
    }

    public function check() {
        $user = $this->db->where('email', $this->input->post('email'))->where('password', md5($this->input->post('password')))->get('users')->row();
        if (!$user) {
            $this->form_validation->set_message('check', lang('users_invalid_email_or_password'));
            return FALSE;
        }
        else
            return TRUE;
    }

}