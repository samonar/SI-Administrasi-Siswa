<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldo extends CI_Controller
{
    function __construct()
    {
         parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
          $session_login=$this->session->userdata('logged_in');
        $user_data=$this->User_model->get_by_id($this->session->userdata('nik'));
        $cek=$this->session->userdata('nama_jabatan');

        $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='admin TU'){
            redirect('user');
        }
    }

    public function create()
    {
      $id=$this->Saldo_model->get_all
      $data = array(
        'query' => $id,
      )
    }
]
?>
