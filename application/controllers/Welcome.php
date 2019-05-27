<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct(){
		  parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session','googlemaps'));
        $this->load->helper(array('form', 'url', 'html'));


        $session_login=$this->session->userdata('logged_in');
      	$session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='admin TU'){
            redirect('user');
        }

	}

	public function index()
	{
		$session_nik=$this->session->userdata('id_user');
        $user_data=$this->User_model->get_by_id($session_nik);

$config['center'] = '37.4419, -122.1419';
$config['zoom'] = 'auto';
$config['directions'] = TRUE;
$config['directionsStart'] = 'State University of Malang';
$config['directionsEnd'] = 'Universitas Brawijaya';
$config['directionsDivID'] = 'directionsDiv';
$this->googlemaps->initialize($config);
// $data['map'] = $this->googlemaps->create_map();
                    // $data['map'] = $this->googlemaps->create_map();

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
                        'map'                   => $this->googlemaps->create_map(),
                        //'user_image'            => $user_data->image,
                        //'user_nama'             => $user_data->nama_,
                        //'user_jabatan'          => $user_data->jabatan,
        );
        $this->template->display('user/beranda_admin', $data);
	}
}
