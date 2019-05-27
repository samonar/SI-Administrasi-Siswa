<?php

class User extends CI_Controller{

	function __construct(){		
		parent::__construct();

		$this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model'));
    $this->load->library(array('form_validation','upload','image_lib','template','session'));
    $this->load->helper(array('form', 'url', 'html'));
	}

	//load form login
	function index(){
		if($this->session->userdata('id_user')){ // utk cek apakah session masih aktif / tidak
            $username      = $this->session->userdata('id_user'); // mengambil username dari session
            $cek_siswa     = $this->User_model->cek_sesion_siswa($username); // cek status = siswa
            $cek_kepsek     = $this->User_model->cek_sesion_kepsek($username); // cek status = guru
            $cek_admin     = $this->User_model->cek_sesion_admin($username); // cek status = admin

			if($cek_siswa->num_rows()>0){
                //jika status = siswa >> lanjut ke beranda untuk siswa
						redirect('spp_siswa');
            }
            else if($cek_admin->num_rows()>0){
                redirect('welcome');
            }
            else if($cek_kepsek->num_rows()>0){
                redirect('spp_kepsek');
            }else{
            	$this->logout();
            }
        }
        else{
            $this->load->view('user/login');
        }
	}

	public function login(){
		$this->load->library('form_validation'); // mengaktifkan form validation dari library
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus di isi');
            redirect('user');
        }else{
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');
			$cek_login = $this->User_model->check_user_account($username,$password);

            if($cek_login->num_rows()>0){
                //$tahun_aktif   = $this->session->userdata('thn_aktif'); // mengambil tahun aktif dari session
                $cek_siswa     = $this->User_model->cek_siswa($username,$password); // cek status = siswa
                $cek_kepsek    = $this->User_model->cek_kepsek($username,$password); // cek status = guru
                $cek_admin     = $this->User_model->cek_admin($username,$password); // cek status = admin
                //$cek_bag_pend  = $this->m_siakad_user->cek_bag_pend($username); // cek status = bag_pend
                //$cek_walikelas = $this->m_siakad_user->cek_walikelas($username); // cek status = bag_pend

                if($cek_siswa->num_rows()>0){
                    //jika status = siswa >> set session + lanjut ke home untuk siswa
										$row = $cek_siswa->row();
								 		$this->session->set_userdata('id_user',$row->id_user);
										$this->session->set_userdata('username',$row->username);
										$this->session->set_userdata('user_nama',$row->nama_user);
										$this->session->set_userdata('nama_jabatan',$row->jabatan);
										$this->session->set_userdata('logged_in',true);
										redirect('spp_siswa');
                }
                else if($cek_kepsek->num_rows()>0){
                    //jika status = guru >> set session + lanjut ke home untuk guru
                    $row = $cek_kepsek->row();
                    $this->session->set_userdata('username',$row->nama_user);
										$this->session->set_userdata('nama_jabatan',$row->jabatan);
										$this->session->set_userdata('id_user',$row->id_user);
										$this->session->set_userdata('logged_in',true);
                    redirect('spp_kepsek');
                }
                else if($cek_admin->num_rows()>0){
                    //jika status = admin >> set session + lanjut ke home untuk admin
                    $row = $cek_admin->row();
                    $this->session->set_userdata('username',$row->nama_user);
										$this->session->set_userdata('nama_jabatan',$row->jabatan);
										$this->session->set_userdata('id_user',$row->id_user);
										$this->session->set_userdata('logged_in',true);
                    redirect('welcome');
                }

            } else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah!');
                redirect('siakad');
            }
        }

	}

	//cek password dan username
	function proses_login(){
		$session_login=$this->session->userdata('logged_in');
		if($session_login==true){
			redirect('welcome');
		}

		//menangkap input
		$username=$this->input->post('username','true');
		$password=$this->input->post('password','true');

		//pencarian data di databasr
		$temp_account=$this->User_model->check_user_account($username,$password)->row();

		//cek jumlah data dari hasil pencarian
		$num_account=count($temp_account);

		//validation
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('user/login');
		}
		else{
			if($num_account>0){

				$session_nik=$this->session->userdata('id_user');

				$array_items=array(
					'id_user'			=> $temp_account->id_user,
					'username'		=> $temp_account->username,
					'nama_jabatan'	=> $temp_account->jabatan,
					'nama_user'	=> $temp_account->nama_user,
					'image'			=> $temp_account->image,
					'logged_in'		=> true,
				);
        			$this->session->set_userdata($array_items);
					redirect(site_url('welcome'));
			}
			else{
				$this->session->set_flashdata('notification','Username dan Password Salah');
				redirect(site_url('user'));
			}
		}
	}

	//logout
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('user'));
	}
}
?>
