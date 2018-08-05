<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export_excel extends CI_Controller
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

    public function tagihan_siswa()
    {
            $session_nik=$this->session->userdata('nik');
            $user_data=$this->User_model->get_by_id($session_nik);
            $det_tagihan = $this->Tagihan_siswa_kls_model->get_all();

                    $data = array(
                        'det_tagihan_model_data'=> $det_tagihan,
                        'button' => 'Presensi Pulang',
                        'action' => site_url('absensi/finish_action'),
                        'class'  => 'fa fa-sign-out',
                        'keterangan_header'     => 'Tagihan Siswa',
                        'page_header'           => 'Tagihan',
                        'menu2'                 => false,
                        'page_header2'          => '',
                        'active'                => 'Data Tagihan',
                        'icon_header'           => 'fa-book',
                        'icon_header2'          => '',
                        'icon_active'           => 'fa-sign-in',
                        'deskripsi_page_header' => '',
                        'user_image'            => $user_data->image,
                        'user_nama'             => $user_data->nama_admin,
                        'user_jabatan'          => $user_data->jabatan,
                    );
                    $this->template->display('det_tagihan/det_tagihan_list', $data);

    }

     public function list_siswa()
    {

            $det_tagihan = $this->Tagihan_siswa_kls_model->get_all();
            $data = array(
                'det_tagihan_model_data'=> $det_tagihan,
                'page_header'           => 'keringanan', //judul halaman
                'active'                => 'ajukan',
            );
            $this->template->display('det_tagihan/list_siswa', $data);
    }

    public function read($id)
    {
        $row = $this->Tagihan_siswa_kls_model->get_by_id($id);
        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);

            $data = array(


        'class'  => 'fa fa-sign-out',
        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
        'menu2'                 => false,
        'page_header2'          => '',
        'active'                => 'Tagihan',
        'icon_header'           => 'fa-book',
        'icon_header2'          => '',
        'icon_active'           => 'fa-sign-in',
        'deskripsi_page_header' => '',


		'id_tagihan_siswa_kelas'      => $row->id_tagihan_siswa_kelas,
		'id_kelas_siswa'      => $row->id_kelas_siswa,
		'id_jn_tagihan'       => $row->id_jn_tagihan,
		'id_pembayaran'       => $row->id_pembayaran,
        'bulan'               => $row->bulan,
		'nominal_tagihan'             => $row->nominal_tagihan,
		'status'              => $row->status_bayar,
        'nis'                 => $row->nis,

        'user_image'            => $user_data->image,
        'user_nama'             => $user_data->nama_admin,
        'user_jabatan'          => $user_data->jabatan,
	    );
            $this->template->display('det_tagihan/det_tagihan_read', $data);

    }

    public function create()
    {
        // $session_nik=$this->session->userdata('nik');
        // $user_data=$this->User_model->get_by_id($session_nik);
        $data = array(
          'action' => site_url('Tagihan_siswa_kelas/create_action'),
          'id_tagihan' => set_value('id_tagihan'),
    			'id_th_akademik' => $this->Th_akademik_model->get_all(),
    			'kelas' => $this->Kelas_model->get_all(),
    			'jn_tagihan' => $this->Jn_tagihan_model->get_all(),
    			'nominal' => set_value('nominal'),
    			'bulan' => set_value('bulan'),

          //'action' => site_url('tagihan_siswa_kelas/create_action'),
      	  //'id_tagihan_siswa_kelas' => set_value('id_tagihan_siswa_kelas'),
      	  //'id_kelas_siswa' => set_value('id_kelas_siswa'),
      	  //'id_jn_tagihan' => set_value('id_jn_tagihan'),
      	  //'id_pembayaran' => set_value('id_pembayaran'),
          //'bulan'         => set_value('bulan'),
      	  //'nominal_tagihan' => set_value('nominal_tagihan'),
      	  //'status_bayar' => set_value('status_bayar'),
	);
        $this->template->display('det_tagihan/det_tagihan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
          $id_tagihan_bulanan=$this->input->post('id_tagihan',TRUE);
          $id_th_akademik=$this->input->post('id_th_akademik',TRUE);
      		$kelas=$this->input->post('kelas',TRUE);
      		$jn_tagihan=$this->input->post('jn_tagihan',TRUE);
      		$nominal=$this->input->post('nominal',TRUE);
      		$bulan= $this->input->post('bulan',TRUE);

        $jumlah=count($bulan);

          for($i=0;$i<$jumlah;$i++)
          {
            $data = array(
            'id_tagihan_bulanan' => $id_tagihan_bulanan,
            'jn_tagihan' => $jn_tagihan,
            'kelas' => $kelas,
            'bulan' => $bulan[$i],
            'nominal' => $nominal,
            'tahun' => $tahun,
            );

            $cek=$this->Tagihan_bulanan_model->cekinput($data);

            $num=$cek->num_rows();

            if($num>0)
            {
              set_flashdata('message', 'Create Record gagal');
              redirect ('tagihan/create_data','refresh');
            }
            else
            {
              $this->Tagihan_bulanan_model->insert1($data);
            }
          }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tagihan_siswa_kelas'));
        }
    }

    public function action_insert(){
      $this->Tagihan_bulanan_model->insert1();
    }

    public function update($id)
    {

         $row = $this->Tagihan_siswa_kls_model->get_by_id($id);
        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);

        $row = $this->Tagihan_siswa_kls_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tagihan_siswa_kelas/update_action'),
        'id_tagihan_siswa_kelas' => set_value('id_tagihan_siswa_kelas', $row->id_tagihan_siswa_kelas),
        'id_kelas_siswa' => set_value('id_kelas_siswa', $row->id_kelas_siswa),
        'id_jn_tagihan' => set_value('id_jn_tagihan', $row->id_jn_tagihan),
        'bulan'         => set_value('bulan',$row->bulan),
        'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
        'nominal_tagihan' => set_value('nominal_tagihan', $row->nominal_tagihan),
        'status_bayar' => set_value('status_bayar', $row->status_bayar),

        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
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
            $this->template->display('det_tagihan/det_tagihan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tagihan_siswa_kelas'));
        }
    }

    public function lihat_tagihan_siswa(){

        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);

            $data = array(
        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
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
            $this->template->display('det_tagihan/siswa_tagihan',$data);
    }

     public function buat_tagihan()
    {
        $det_tagihan = $this->Tagihan_bulanan_model->search();
            $data = array(
        'query'=> $det_tagihan,
        'action' => site_url('tagihan_siswa_kelas/buat_tagihan'),
    );
        $this->template->display('det_tagihan/cek_tagihan',$data);
    }

    public function gentagihan()
    {
        $data = array(
            'action' => site_url('tagihan_siswa_kelas/create_gentagihan'),
            'id_tagihan_siswa_kelas'=> set_value('id_tagihan_siswa_kelas'),
            'id_th_akademik'=> $this->Th_akademik_model->get_all(),
            'page_header'           => 'tagihan', //judul halaman
            'active'                => 'generate tagihan',
            //'semester' => $this->Th_akademik_model->pilih(),
        );
        $this->template->display('det_tagihan/generate_form',$data);
    }

    public function create_gentagihan()
    {
        $this->_rules2();

          if ($this->form_validation->run() == FALSE) {
          //  redirect('det_tagihan/generate_form');
          } else {

  			$data = array(
  					'id_th_akademik' => $this->input->post('id_th_akademik',TRUE),
  					);

  			$cek=$this->Tagihan_siswa_kls_model->cekgenerate($data);

  			$num=$cek->num_rows();

  			if($num>0)
  			{
  				echo "<script>alert('Generate tagihan sudah pernah dilakukan')</script>";
  				redirect ('tagihan_siswa_kelas/gentagihan','refresh');
  			}
  			else
  			{
  				$generate=$this->Tagihan_siswa_kls_model->tagihan_siswa($data);
  				foreach($generate->result() as $row){
  					$id_kelas_siswa        = $row->id_kelas_siswa;
  					$id_tagihan_bulanan    = $row->id_tagihan_bulanan;
            $bayar = 0;
  					$bulan      = $row->bulan;
  					$nominal     = $row->nominal;
            $status = 0;

  					$this->Tagihan_siswa_kls_model->inputGenerate($id_kelas_siswa,$id_tagihan_bulanan,$bayar,$bulan,$nominal,$status);
  				}
          $this->session->set_flashdata('message', 'Generate Berhasil');
    			redirect(site_url('tagihan_siswa_kelas/gentagihan'));
  			}

        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tagihan_siswa_kelas', TRUE));
        } else {
            $data = array(
        'id_kelas_siswa' => $this->input->post('id_kelas_siswa',TRUE),
        'id_jn_tagihan' => $this->input->post('id_jn_tagihan',TRUE),
        'bulan'         => $this->input->post('bulan',TRUE),
        'id_pembayaran' => $this->input->post('id_pembayaran',TRUE),
        'nominal_tagihan' => $this->input->post('nominal_tagihan',TRUE),
        'status_bayar' => $this->input->post('status_bayar',TRUE),
        );

            $this->Tagihan_siswa_kls_model->update($this->input->post('id_tagihan_siswa_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tagihan_siswa_kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tagihan_siswa_kls_model->get_by_id($id);

        if ($row) {
            $this->Tagihan_siswa_kls_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tagihan_siswa_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tagihan_siswa_kelas'));
        }
    }

    //melihat data tagihan dan pembayaran siswa tiap kelas_siswa
    public function detail_tagihan($nis)
    {
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
                'pembayaran' =>$this->Pembayaran_model->get_by_nis($nis),
                'page_header'                => 'kelas',
              );
              $data['active']='kelas'.$data['nama']->id_kelas;

      $this->template->display('siswa/detail_tagihan',$data);
    }

    public function daftar_pengajuan($nis)
    {
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
              );

      $this->template->display('siswa/tagihan_keringanan',$data);
    }

    function pengajuan_keringanan($id_tagihan , $nis)
    {
      $data = array(
        'action' => site_url('tagihan_siswa_kelas/proses_pengajuan'),
        'nama' => $this->Siswa_model->biodata_siswa($nis),
        'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
        'id_tagihan_siswa' => $id_tagihan,
        'data_tagihan' => $this->Tagihan_siswa_kls_model->cari_tagihan($id_tagihan),
      );

      $this->template->display('det_tagihan/pengajuan_keringanan',$data);
    }

    public function proses_pengajuan()
    {
      $this->_rules3();

      if ($this->form_validation->run() == FALSE) {

      } else {
          $data = array(
      'nominal_akhir' => $this->input->post('tagihan_akhir',TRUE),
      'id_tagihan_siswa' => $this->input->post('id_tagihan_siswa',TRUE),
      'status_pengajuan'=> '0',
      'date' => date('Y-m-d'),
      );

        $id= $this->input->post('id_tagihan_siswa',TRUE);
        $data2=array('status_bayar' =>2 , );

        $this->Tagihan_siswa_kls_model->update($id,$data2);
        $this->Tagihan_siswa_kls_model->input_pengajuan($data);
        $this->session->set_flashdata('message', 'input sukses');
        $this->template->display('template/notif_sukses');
      }
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tagihan_siswa_kls.xls";
        $judul = "tagihan_siswa_kls";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tagihan Bulanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal Tagihan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Tagihan_siswa_kls_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tagihan_bulanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pembayaran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bulan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nominal_tagihan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


    public function _rules()
    {
	$this->form_validation->set_rules('id_kelas_siswa', 'id kelas siswa', 'trim|required');
	$this->form_validation->set_rules('id_jn_tagihan', 'id tagihan', 'trim|required');
	$this->form_validation->set_rules('id_pembayaran', 'id pembayaran', 'trim|required');
	$this->form_validation->set_rules('nominal_tagihan', 'nominal', 'trim|required');
	$this->form_validation->set_rules('status_bayar', 'status_bayar', 'trim|required');

	$this->form_validation->set_rules('id_tagihan_siswa_kelas', 'id_tagihan_siswa_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules2()
    {
	$this->form_validation->set_rules('id_th_akademik', 'id_th_akademik', 'trim|required');


	$this->form_validation->set_rules('id_tagihan_siswa_kelas', 'id_tagihan_siswa_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules3()
    {
	$this->form_validation->set_rules('tagihan_akhir', 'tagihan_akhir', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Det_tagihan.php */
/* Location: ./application/controllers/Det_tagihan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-04 21:51:27 */
/* http://harviacode.com */
