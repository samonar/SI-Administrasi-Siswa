<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldo_model extends CI_Model
{
    public $table = 'saldo';
    public $id = 'id_saldo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
      $this->db->order_by($this->id, $this->order);
      $this->db->get($this->table)->result();
    }

    function cari_saldo_by_id($nis)
    {
      $this->db->where('id_saldo',$nis);
      return $this->db->get($this->table)->row();
    }

    public function cek_nomor()
    {
      $this->db->from($this->table);
            return $this->db->count_all_results();
    }

    function update($id, $nominal)
    {
      $data['nominal']=$nominal;
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function insert($hasil)
    {
      $data = array(
        'id_saldo' => $hasil ,
        'nominal' => '0',
      );
        $this->db->insert($this->table, $data);
    }

    function insert_saldo_excel($saldo)
    {

      $this->db->insert($this->table, $data);
    }

}
