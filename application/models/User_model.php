<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
  }

  function pesan($nis)
  {
    $this->db->where('id_user',$nis);
    return $this->db->get($this->table);
  }
	//get by username dan password
	function check_user_account($username,$password)
  {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get();
	}

  function cek_sesion_siswa($username)
  {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$username);
    $this->db->where('jabatan','siswa');
		return $this->db->get();
	}

  function cek_sesion_admin($username)
  {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$username);
    $this->db->where('jabatan','admin TU');
		return $this->db->get();
	}

  function cek_sesion_kepsek($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$username);
    $this->db->where('jabatan','Kepala Sekolah');
		return $this->db->get();
	}

  function cek_siswa($username,$password)
  {
		$this->db->select('*');
    $this->db->join('siswa','user.id_user = siswa.nis');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
    $this->db->where('jabatan','siswa');
		return $this->db->get();
	}

  function cek_kepsek($username,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
    $this->db->where('jabatan','Kepala Sekolah');
		return $this->db->get();
	}

  function cek_admin($username,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
    $this->db->where('jabatan','admin TU');
		return $this->db->get();
	}
	 function get_by_id($id)
  {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
  }
}
?>
