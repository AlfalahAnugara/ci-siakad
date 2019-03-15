<?php

class Home extends CI_Controller{

    public function index(){
      $data['judul']='Selamat Datang Admin';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar'); 
      $this->load->view('admin/home');
      $this->load->view('template/footer'); 
    }
    public function nilai(){
      $data['judul']='Nilai Siswa';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar'); 
      $this->load->view('template/footer');
      $this->load->view('admin/nilai');
    }
    public function pengumuman(){
      $data['judul']='Buat Pengumuman';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar'); 
      $this->load->view('admin/pengumuman');
    }

    public function aturspp(){
      $data['judul']='Atur Status Spp';
      $this->load->view('template/header',$data);
      $this->load->view('template/sidebar'); 
      $this->load->view('admin/aturspp');
    }
    public function tambahnilai(){
    $data['judul']='Tambah Nilai Siswa';
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar'); 
    $this->load->view('admin/tambahnilai');
    }

    public function tambahsiswa(){
      
    }

    public function login() {
      $this->load->view('admin/login/login') ;
    }
}