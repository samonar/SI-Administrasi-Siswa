<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        if($session_jabatan!='admin TU'){
            redirect('user');
        }

    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran/index.html';
            $config['first_url'] = base_url() . 'pembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_model->total_rows($q);
        $pembayaran = $this->Pembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_data' => $pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('pembayaran/pembayaran_list', $data);
    }

    public function bayar_bank()
    {
      $data = array(
        'page_header'           => 'pembayaran', //judul halaman
        'active'                => 'kelas',
      );
      $data['num_rows'] = $this->db->get('tmp')->num_rows();
      $data['action'] = site_url('excel_import2/import_data');
      $data['briva'] = $this->db->get('tmp')->result();
      $data['judul'] = set_value('judul');



      $this->template->display('pembayaran/bayar_bank_form',$data);
    }

    public function read($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembayaran' => $row->id_pembayaran,
		'nis' => $row->nis,
		'id_jn_tagihan' => $row->id_jn_tagihan,
		'nominal_bayar' => $row->nominal_bayar,
		'tgl' => $row->tgl,
		'ket' => $row->ket,
	    );
            $this->load->view('pembayaran/pembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create_bayar($id_tagihan , $nis)
    {
      $idsiswa="S".$nis;
      $data = array(
        'action' => site_url('pembayaran/bayar_action'),
        'nama' => $this->Siswa_model->biodata_siswa($nis),
        'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
        'id_tagihan_siswa' => $id_tagihan,
        'data_tagihan' => $this->Tagihan_siswa_kls_model->cari_tagihan($id_tagihan),
        'page_header'                => 'kelas',
        'saldo' => $this->Saldo_model->cari_saldo_by_id($idsiswa),
      );
      
      $data['active']='kelas'.$data['nama']->id_kelas;
      $this->template->display('pembayaran/bayar_form',$data);
    }

    function bayar_action()
    {
      $this->_rules1();

      if ($this->form_validation->run() == FALSE) {
          $this->create_bayar();
      } else {
          $cek=$this->input->post('saldo',TRUE);
          if (isset($cek)) {
            $th_aktif=$this->Th_akademik_model->id_th_aktif();
          $data = array(
            'nis' => $this->input->post('nis',TRUE),
            'id_jn_tagihan'=> $this->input->post('id_jn_tagihan', TRUE),
            // 'nominal_bayar' => $this->input->post('nominal_bayar',TRUE),
            'tgl' => date('Y-m-d'),
            'ket' => 'Pembayaran Langsung',
            'th_akademik' => $th_aktif->id_th_akademik,
          );
          $jml_tagihan= $this->input->post('jml_tagihan');
          
          $data2['id_tagihan_siswa_kelas'] = $this->input->post('id_tagihan_siswa_kelas',TRUE);
          $jumlah=$this->Pembayaran_model->total_rows();
          $saldosisa = $this->Siswa_model->biodata_siswa($data['nis']);
          if ($jumlah>= 0) {
           $jumlah=$jumlah+1;
           $nomor=$jumlah;
           $data['id_pembayaran'] = $nomor;
         }
         $tag_akhir=$jml_tagihan - $saldosisa->nominal ;
         
         //echo $jml_tagihan.'-'.$data['nominal_bayar'].'+'.$saldosisa->nominal.'='.$saldo_akhir.'|';
         
         echo 'awalnya ='.$tag_akhir;

         if ($tag_akhir<=0) {
          $sisa=abs($tag_akhir);
          $data['nominal_bayar'] = $jml_tagihan;
          $this->Tagihan_siswa_kls_model->update_bayar_lunas($data2['id_tagihan_siswa_kelas'],$data['id_pembayaran'],$data['tgl']);
          $this->Pembayaran_model->insert($data);
          $this->Saldo_model->update('S'.$data['nis'],$sisa);

          $this->session->set_flashdata('message', 'Transaksi Pembayaran Berhasil');
          redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
           // $this->session->set_flashdata('message', 'Transaksi Pembayaran Gagal');
           // redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
         }else {
          $data['nominal_bayar'] = $saldosisa->nominal;
          $this->Tagihan_siswa_kls_model->update_bayar_cicil($data2['id_tagihan_siswa_kelas'],$data['id_pembayaran'],$data['tgl'],$tag_akhir  );
          $this->Pembayaran_model->insert($data);
          $nol=0;
          $this->Saldo_model->update('S'.$data['nis'],$nol);
          
          $this->session->set_flashdata('message', 'Transaksi Pembayaran Berhasil');
          redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
          }
          }else{
            //kosong tanpa pake saldo
            $th_aktif=$this->Th_akademik_model->id_th_aktif();
            $data = array(
              'nis' => $this->input->post('nis',TRUE),
              'id_jn_tagihan'=> $this->input->post('id_jn_tagihan', TRUE),
              'nominal_bayar' => $this->input->post('nominal_bayar',TRUE),
              'tgl' => date('Y-m-d'),
              'ket' => 'Pembayaran Langsung',
              'th_akademik' => $th_aktif->id_th_akademik,
            );
          $jml_tagihan= $this->input->post('jml_tagihan');
          $data2['id_tagihan_siswa_kelas'] = $this->input->post('id_tagihan_siswa_kelas',TRUE);
          $jumlah=$this->Pembayaran_model->total_rows();
          $saldosisa = $this->Siswa_model->biodata_siswa($data['nis']);
          if ($jumlah>= 0) {
           $jumlah=$jumlah+1;
           $nomor=$jumlah;
           $data['id_pembayaran'] = $nomor;
         }
         $tag_akhir=$jml_tagihan - $data['nominal_bayar'] ;
         echo 'awalnya ='.$tag_akhir;

         if ($tag_akhir<=0) {
          $sisa=abs($tag_akhir);
          $this->Tagihan_siswa_kls_model->update_bayar_lunas($data2['id_tagihan_siswa_kelas'],$data['id_pembayaran'],$data['tgl']);
          $this->Pembayaran_model->insert($data);
          $this->Saldo_model->update('S'.$data['nis'],$sisa);

          $this->session->set_flashdata('message', 'Transaksi Pembayaran Berhasil');
          redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
           // $this->session->set_flashdata('message', 'Transaksi Pembayaran Gagal');
           // redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
         }else {
          $this->Tagihan_siswa_kls_model->update_bayar_cicil($data2['id_tagihan_siswa_kelas'],$data['id_pembayaran'],$data['tgl'],$tag_akhir  );
          $this->Pembayaran_model->insert($data);

          
          $this->session->set_flashdata('message', 'Transaksi Pembayaran Berhasil');
          redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
          // $this->session->set_flashdata('message', 'Transaksi Pembayaran Berhasil');
          // redirect(base_url()."tagihan_siswa_kelas/detail_tagihan/".$data['nis']);
          }
        
      }
    }
}
    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'id_pembayaran' => set_value('id_pembayaran'),
	    'nis' => set_value('nis'),
	    'id_jn_tagihan' => set_value('id_jn_tagihan'),
	    'nominal_bayar' => set_value('nominal_bayar'),
	    'tgl' => set_value('tgl'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('pembayaran/pembayaran_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'id_jn_tagihan' => $this->input->post('id_jn_tagihan',TRUE),
		'nominal_bayar' => $this->input->post('nominal_bayar',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }


    public function update($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
		'nis' => set_value('nis', $row->nis),
		'id_jn_tagihan' => set_value('id_jn_tagihan', $row->id_jn_tagihan),
		'nominal_bayar' => set_value('nominal_bayar', $row->nominal_bayar),
		'tgl' => set_value('tgl', $row->tgl),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->load->view('pembayaran/pembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'id_jn_tagihan' => $this->input->post('id_jn_tagihan',TRUE),
		'nominal_bayar' => $this->input->post('nominal_bayar',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function sinkron()
    {
      $data = array(
        'bayar' => $this->Pembayaran_model->bayar_excel_total()->result(),
        'briva' => $this->Pembayaran_model->bayar_excel_id()->result(),
      );
      $bayar = $this->Pembayaran_model->bayar_excel_total()->result();
      $briva = $this->Pembayaran_model->bayar_excel_id()->result();
      $result=$this->Pembayaran_model->jumlah_data()->row();
      $jumlah=$this->Pembayaran_model->total_rows();
      $th_aktif=$this->Th_akademik_model->id_th_aktif();
      $berhitung=0;

      for ($j=0; $j < $result->jml_data ; $j++) {
        $o=($briva[$j]->briva);
        $nis=substr($o,5,5);
        $saldosisa = $this->Siswa_model->biodata_siswa($nis);
        $s=($bayar[$j]->total + $saldosisa->nominal );

        $row_tag = $this->Tagihan_siswa_kls_model->row_tagihan_aktf($nis)->row();
        $tagihan= $this->Tagihan_siswa_kls_model->tagihan_lunas($nis);
        $tot_tag = $this->Tagihan_siswa_kls_model->totTagihan($nis)->row();


        //print('data ke' .++$berhitung.'=========================================<br>');
        $jml_tag=($row_tag->jumlah);
        //print('<br>');
        //echo 'jumlah  tagihan ='.($tot_tag->total);
        $b=200000;

        //print('<br>');
        //echo 'siswa nis='.$nis.' | id virtual '.$o.' | memiliki jumlah saldo = '.$s;
        //print('<br>');
        $no=0;
        $hit=0;
        for ($i=0; $i < $jml_tag ; $i++) {
          //echo ++$no;
          //echo " di kurangi tagihan ".$tagihan[$i]->jn_tagihan.$tagihan[$i]->bulan." ke ".$no.'-> sejumlah Rp.'.($tagihan[$i]->nominal_tagihan);
          $s-=($tagihan[$i]->nominal_tagihan);
          if ($s>=0) {
            $jumlah++;
            //echo '='.$s.' tagihan sukses';
            //echo " | saldo tinggal = ".$s;
            $saldo_akhir=$s;
            $hit++;
          }else {
            //echo " | saldo tinggal = ".$s;
            //echo " saldo tidak cukup ";
            //echo '<br>';
            //echo "untuk ".$hit." pembayaran";
            //echo '<br>';
            break;
          }
          $this->Tagihan_siswa_kls_model->update_bayar($tagihan[$i]->id_tagihan_siswa_kelas,$jumlah,date('Y-m-d'));
           $data['id_tagihan_siswa_kelas']= $tagihan[$i]->id_tagihan_siswa_kelas;
           $data_pembayaran['nis']=$nis;
          $data_pembayaran['id_pembayaran'] = $jumlah;
           $data_pembayaran['id_jn_tagihan'] = $tagihan[$i]->id_jn_tagihan;
           $data_pembayaran['nominal_bayar']=  $tagihan[$i]->nominal_tagihan;
           $data_pembayaran['tgl'] = date('Y-m-d');
           $data_pembayaran['ket'] = "Via Bank";
           $data_pembayaran['id_briva'] =$o ;
           $data_pembayaran['th_akademik']= $th_aktif->id_th_akademik;
          $this->Pembayaran_model->insert($data_pembayaran);
          //print('<br>');
        }
        $this->Saldo_model->update('S'.$data_pembayaran['nis'], $saldo_akhir);
        //echo 'nis = '.$data_pembayaran['nis']."saldo teakhir tiap siswa = ".$saldo_akhir;
        //print('<br>');
      }
      $this->db->truncate('tmp');
      $this->session->set_flashdata('message', 'Syncronize berhasil');
      redirect(site_url('pembayaran/bayar_bank'));
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('id_jn_tagihan', 'id jn tagihan', 'trim|required');
	$this->form_validation->set_rules('nominal_bayar', 'nominal bayar', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules1()
    {


	$this->form_validation->set_rules('nominal_bayar', 'nominal bayar', 'trim|required');


	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:44 */
/* http://harviacode.com */
