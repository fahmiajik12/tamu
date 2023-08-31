<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mtamu extends CI_Model
{
    public function view()
    {
        return $this->db->get('tb_tamu')->result();
    }

    public function jml_tamu()
    {
        return $this->db->query('SELECT DATE(waktu) AS wkt, COUNT(waktu) AS jumlah FROM `tb_tamu` GROUP BY DATE(waktu)')->result();
    }

    public function validation($mode)
    {
        $this->load->library('form_validation');
        if ($mode == "save") {
            $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
            $this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('input_keperluan', 'Keperluan', 'required|max_length[15]');
        } else if ($mode == "update") {
            $this->form_validation->set_rules('edit_nama', 'Nama', 'required|max_length[50]');
            $this->form_validation->set_rules('edit_jeniskelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('edit_alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('edit_keperluan', 'Keperluan', 'required|max_length[15]');
            $this->form_validation->set_rules('edit_kesiapa', 'Kesiapa', 'required|max_length[50]');
            $this->form_validation->set_rules('edit_asalinstansi', 'Asal Instansi', 'required|max_length[100]');
        }
        if ($this->form_validation->run()) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        $data = array(
            "nama" => $this->input->post('input_nama'),
            "jenis_kelamin" => $this->input->post('input_jeniskelamin'),
            "alamat" => $this->input->post('input_alamat'),
            "keperluan" => $this->input->post('input_keperluan'),
            "kesiapa" => $this->input->post('input_kesiapa'),
            "asal_instansi" => $this->input->post('input_asalinstansi'), // Update field name
            "waktu" => $this->input->post('input_waktu')
        );
        $this->db->insert('tb_tamu', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_tamu', $id);
        $this->db->delete('tb_tamu');
    }

    public function get_all_tanda_tangan()
    {
        $query = $this->db->select('nama, ttd')
            ->from('tb_tamu')
            ->get();

        return $query->result_array();
    }

    public function tanda_tangan()
    {
        $this->load->model('Tamu_model');
        $data['tanda_tangan'] = $this->Tamu_model->get_all_tamu();
        $this->load->view('tanda_tangan_view', $data);
    }
    public function get_single_tamu($id) {
      return $this->db->where('id_tamu', $id)
                      ->get('tb_tamu')
                      ->row_array();
  }
  
  public function edit($id, $data) {
      $this->db->where('id_tamu', $id)
               ->update('tb_tamu', $data);
  
      return $this->db->affected_rows() > 0;
  }
}
