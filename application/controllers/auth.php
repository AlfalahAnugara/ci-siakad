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

        if ($login == 1) {
            $row = $this->auth_model->data_login($this->input->post('username') , md5($this->input->post('password'))) ;

            $data = array(
                'logged' => TRUE ,
                'username' => $row->username
            ) ;
            $this->session->set_userdata($data) ;

            redirect(site_url('user')) ;
        } else {

            $error = 'username / password salah' ;
            $this->index($error) ;
        }
    }

    function logout() {
        $this->session->sess_destroy() ;

        redirect(site_url('auth')) ;
    }
}