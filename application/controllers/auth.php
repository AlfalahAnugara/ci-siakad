<?php if (!defined('BASEPATH')) exit ('No Direct script access allowed') ;

class Auth extends CI_Controller {

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page' ,
            'action' => site_url('auth/login') ,
            'error' => $error
        ) ;
        $this->load->view('login' , $data) ;
    }

    public function login() {
        $this->load->model('auth_model') ;
        $login = $this->auth_model->login($this->input->post('username') , md5($this->input->post('password'))) ;
        
    }
}