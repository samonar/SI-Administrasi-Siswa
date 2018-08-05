<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
         parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model','Th_akademik_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
          $session_login=$this->session->userdata('logged_in');
        $user_data=$this->User_model->get_by_id($this->session->userdata('nik'));
        $cek=$this->session->userdata('nama_jabatan');

        $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan=='siswa' ){
            redirect('user');
        }
    }

    public function index()
    {
        $session_nik=$this->session->userdata('nik');
            $user_data=$this->User_model->get_by_id($session_nik);
            $siswa_data = $this->Siswa_model->get_all1();

                    $data = array(
                        'siswa_data'=> $siswa_data,

                        'action' => site_url('absensi/finish_action'),
                        'class'  => 'fa fa-sign-out',
                        'keterangan_header'     => 'Siswa Siswa',
                        'page_header'           => 'Siswa',
                        'menu2'                 => false,
                        'page_header2'          => '',
                        'active'                => 'Lihat Data Siswa',
                        'icon_header'           => 'fa-book',
                        'icon_header2'          => '',
                        'icon_active'           => 'fa-sign-in',
                        'deskripsi_page_header' => '',
                        'user_image'            => $user_data->image,
                        'user_nama'             => $user_data->nama_admin,
                        'user_jabatan'          => $user_data->jabatan,
                    );
                    $this->template->display('siswa/siswa_list', $data);

    }

    public function siswa($idkls)
    {
    	$query=$this->Siswa_model->get_all1($idkls);
      $bln=date('m');
      $data = array(
        'bln'                   => $bln,
        'idkls'                 =>$idkls,
        'page_header'           => 'kelas', //judul halaman
        'active'                => 'kelas'.$idkls,
        'siswa_data' =>$query,
        'kelas' =>$this->Kelas_model->get_by_id($idkls),
        'export_pembayaran'     =>$this->Tagihan_siswa_kls_model->count_export_pembayaran($idkls,$bln)->result(),
        'export_tagihan'        =>$this->Tagihan_siswa_kls_model->count_export_tagihan($idkls,$bln)->result(),
      );
      $this->template->display('siswa/siswa_list', $data);

    }

    public function read($id)
    {
        $session_nik=$this->session->userdata('nik');
            $user_data=$this->User_model->get_by_id($session_nik);
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'nis' => $row->nis,
        		'nama_siswa' => $row->nama_siswa,
        		'jk' => $row->jk,
        		'no_hp_wali' => $row->no_hp_wali,
        		'th_masuk' => $row->th_masuk,
            'id_virtual' => $row->id_virtual,
            'id_saldo' => $row->id_saldo,
            'nama_wali' => $row->nama_wali,
            'alamat'=> $row->alamat,
	    );
            $this->template->display('siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create()
    {
      $session_nik=$this->session->userdata('nik');
      $user_data=$this->User_model->get_by_id($session_nik);
      $data = array(
          'button' => 'Create',
          'action' => site_url('siswa/create_action'),
         'nis' => set_value('nis'),
          'id_th_akademik' => $this->Th_akademik_model->th_aktif(),
          'kelas' => $this->Kelas_model->get_all_exc(),
          'nama_siswa' => set_value('nama_siswa'),
          'id_virtual'=> set_value('id_virtual'),
          'jk' => set_value('jk'),
          'page_header'           => 'tagihan', //judul halaman
          'active'                => 'buat tagihan',
     );
  $this->template->display('kelas_siswa/kelas_siswa_form', $data);
    }

    public function create_action()
    {
        $this->_rules2();

        if ($this->form_validation->run() == FALSE) {
          redirect('kelas_siswa/create');
        } else {
          $thn= date('Y');
            $data = array(
            'nis' => $this->input->post('nis',TRUE),
            'nama_siswa' => $this->input->post('nama_siswa',TRUE),
        		'id_virtual' => '70231'.$this->input->post('nis',TRUE).$thn,
        		'jk' => $this->input->post('jk',TRUE),
          );
            $data2=array(
              'nis' => $this->input->post('nis'),
              'id_kelas' => $this->input->post('kelas'),
              'id_th_akademik' => $this->input->post('id_th_akademik'),
            );
              $data['id_saldo'] = 'S'.$this->input->post('nis',TRUE);

              $aktif = array(
                'page_header'           => 'kelas', //judul halaman
                'active'                => 'kelas'.$data['jk'],
              );
              $cek=$this->Siswa_model->cek_siswa($data)->result();
              if ($cek== NULL) {
                $this->Saldo_model->insert($data['id_saldo'] );
                $this->Siswa_model->insert($data);
                $this->Kelas_siswa_model->insert_siswa($data2);
                $this->session->set_flashdata('message', 'Create Record Success');
                $this->template->display('template/notif_sukses',$aktif);
              }else {
                $session_nik=$this->session->userdata('nik');
                $user_data=$this->User_model->get_by_id($session_nik);
                $data = array(
                    'button' => 'Create',
                    'action' => site_url('siswa/create_action'),
              	    'nis' => set_value('nis'),
                    'id_th_akademik' => $this->Th_akademik_model->th_aktif(),
                    'kelas' => $this->Kelas_model->get_all_exc(),
                    'nama_siswa' => set_value('nama_siswa'),
                    'id_virtual'=> set_value('id_virtual'),
                    'jk' => set_value('jk'),
                    'page_header'           => 'kelas', //judul halaman
                    'active'                => '',

        	      );
                $this->session->set_flashdata('message', 'Siswa Sudah Ada !');
                $this->template->display('kelas_siswa/kelas_siswa_form', $data);

              }
        }
    }

    public function update($id)
    {

          $session_nik=$this->session->userdata('nik');
            $user_data=$this->User_model->get_by_id($session_nik);
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'nis' => set_value('nis', $row->nis),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'jk' => set_value('jk', $row->jk),
		'no_hp_wali' => set_value('no_hp_wali', $row->no_hp_wali),
		'th_masuk' => set_value('th_masuk', $row->th_masuk),
        'id_saldo' => set_value('id_saldo', $row->id_saldo),

         'keterangan_header'     => 'Siswa',
                        'page_header'           => 'Siswa',
                        'menu2'                 => false,
                        'page_header2'          => '',
                        'active'                => 'Lihat Data Tagihan',
                        'icon_header'           => 'fa-book',
                        'icon_header2'          => '',
                        'icon_active'           => 'fa-sign-in',
                        'deskripsi_page_header' => '',
                        'user_image'            => $user_data->image,
                        'user_nama'             => $user_data->nama_admin,
                        'user_jabatan'          => $user_data->jabatan,
	    );
            $this->template->display('siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nis', TRUE));
        } else {
            $data = array(
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'no_hp_wali' => $this->input->post('no_hp_wali',TRUE),
		'th_masuk' => $this->input->post('th_masuk',TRUE),
	    );

            $this->Siswa_model->update($this->input->post('nis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    function siswa_sekolahan()
    {
      $nis= $this->input->post('nis');
      $data= array(
        'action' => site_url('siswa/siswa_sekolahan'),
        'nis' => set_value('nis'),
        'siswa' => $this->Siswa_model->all_siswa($nis),
    );
      $this->template->display('siswa/siswa_sekolahan',$data);
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('no_hp_wali', 'no hp wali', 'trim|required');
	$this->form_validation->set_rules('th_masuk', 'th masuk', 'trim|required');

	$this->form_validation->set_rules('nis', 'nis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules2()
    {
      $this->form_validation->set_rules('nis','nis','required');
      $this->form_validation->set_rules('nama_siswa','nama_siswa','trim|required');
      $this->form_validation->set_rules('jk','jk','trim|required');
      $this->form_validation->set_rules('kelas','kelas','trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:44 */
/* http://harviacode.com */
