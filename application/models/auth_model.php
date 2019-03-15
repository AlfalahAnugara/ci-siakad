<?php if (! defined('BASEPATH')) exit ('no direct script access allowed') ;

class Auth_model extends CI_Model {

    function login($username , $password) {
        $this->db->where('username' , $username) ;
        $this->db->where('password' , $password);
        $query = $this->db->get('user');
        return $query->num_rows() ;

    }

    function data_login($username , $password) {
        $this->db->where('username' , $username) ;
        $this->db->where('password' , $password) ;
        return $this->db->get('user')->row() ;
    }
}