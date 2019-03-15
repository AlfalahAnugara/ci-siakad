<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
            
        $this->load->model('m_user');
    }

	function index()
	{
		$this->load->view('admin/login');
	}

  	function proses() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_login', '<br>Nama atau Password belum diisi.');
			 redirect();
        } else {
            $Username = $this->input->post('username');
            $Password = $this->input->post('password');
            $u = mysql_real_escape_string($Username);
            $p = mysql_real_escape_string($Password);
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['Username'] = $qad->username;
					$sess_data['Password'] = $qad->password;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
	            redirect();
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}