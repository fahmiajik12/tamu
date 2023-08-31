<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function simpan_data($data)
    {
        return $this->db->insert('tb_tamu', $data);
    }

    public function simpan_tanda_tangan($data)
    {
        $signatureData = array(
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'kesiapa' => $data['kesiapa'], // Tambahkan kesiapa
            'keperluan' => $data['keperluan'],
            'asal_instansi' => $data['asal_instansi'], // Tambahkan asal_instansi
            'waktu' => $data['waktu'],
            'ttd' => $data['ttd']
        );

        return $this->db->insert('tb_tamu', $signatureData);
    }

    public function get_all_tanda_tangan()
    {
        $query = $this->db->select('id_tamu, nama, jenis_kelamin, alamat, kesiapa, keperluan, asal_instansi, waktu, ttd')
            ->from('tb_tamu')
            ->get();

        return $query->result_array();
    }
    
    public function get_tamu($id) {
        return $this->db->get_where('tb_tamu', array('id_tamu' => $id))->row();
    }
    
    public function update_tamu($id, $data) {
        $this->db->where('id_tamu', $id);
        $this->db->update('tb_tamu', $data);
    }
}
