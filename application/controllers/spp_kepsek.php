<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class spp_kepsek extends CI_Controller
{
    function __construct()
    {
         parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));

        $session_login=$this->session->userdata('logged_in');
        $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='Kepala Sekolah'){
            redirect('user');
        }
    }

    public function index()
  	{
  		$session_nik=$this->session->userdata('id_user');
          $user_data=$this->User_model->get_by_id($session_nik);
                      $data = array(
                          'button' => 'Presensi Pulang',
                          'action' => site_url('absensi/finish_action'),
                          'class'  => 'fa fa-sign-out',
                          'keterangan_header'     => '',
                          'menu2'                 => false,
                          'page_header2'          => '',
                          'active'                => '',
  												'page_header'           => '', //judul halaman
                          'icon_active'           => 'fa-sign-in',

                          'icon_header'           => 'fa-book',
                          'icon_header2'          => '',
                          'deskripsi_page_header' => '',
                          //'user_image'            => $user_data->image,
                          //'user_nama'             => $user_data->nama_,
                          //'user_jabatan'          => $user_data->jabatan,
          );
          $this->template->display('user/beranda_admin', $data);
  	}
}

?>
