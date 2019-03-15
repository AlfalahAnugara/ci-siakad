<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    function cek($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("pegawai") ;
    }

}