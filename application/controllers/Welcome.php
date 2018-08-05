<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		  parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
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
