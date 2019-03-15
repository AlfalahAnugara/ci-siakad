<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Loginsiswa extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database('siakadsma');
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
          //get the posted values
          $Username = $this->input->post("nis");
          $Password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("nis", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('loginsiswa_view');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($Username, $Password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'nip' => $Username,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("home");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login');
                    }
               }
               else
               {
                    redirect('login');
               }
          }
     }
}?>