<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Tamu_model');
    }

    public function index()
    {
        $this->load->view('tamu_form');
    }

    public function submit()
    {
        $this->load->library('form_validation');

        // Set aturan validasi sesuai kebutuhan
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        // ... aturan validasi lainnya ...

        if ($this->form_validation->run() == FALSE)
        {
            // Jika validasi gagal, tampilkan form kembali dengan pesan error
            $this->load->view('tamu_form');
        }
        else
        {
            // Ambil data tanda tangan dari input hidden
            $tanda_tangan = $this->input->post('signature');

            // Simpan data ke database
            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kesiapa' => $this->input->post('kesiapa'), // Menambahkan field "Kesiapa"
                'keperluan' => $this->input->post('keperluan'),
                'asal_instansi' => $this->input->post('asal_instansi'), // Menambahkan field "Asal Instansi"
                'waktu' => $this->input->post('waktu')
            );

            // Konversi base64 tanda tangan menjadi gambar PNG dan simpan di folder uploads
            $tanda_tangan_base64 = $this->input->post('signature');
            $tanda_tangan_binary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $tanda_tangan_base64));
            $tanda_tangan_filename = uniqid() . '.png';
            $tanda_tangan_path = FCPATH . 'uploads/' . $tanda_tangan_filename;

            if (file_put_contents($tanda_tangan_path, $tanda_tangan_binary)) {
                $data['ttd'] = 'uploads/' . $tanda_tangan_filename;

                // Simpan data ke database menggunakan model
                $this->load->model('Tamu_model');
                if ($this->Tamu_model->simpan_data($data)) {
                    // Jika data berhasil disimpan, tampilkan pesan sukses
                    $this->load->view('tamu_form', ['success' => 'Data berhasil disimpan!']);
                } else {
                    // Jika data gagal disimpan, tampilkan pesan error
                    $this->load->view('tamu_form', ['error' => 'Gagal menyimpan data ke database.']);
                }
            } else {
                // Jika penyimpanan gambar gagal, tampilkan pesan error
                $this->load->view('tamu_form', ['error' => 'Gagal menyimpan gambar tanda tangan.']);
            }
        }
    }
    public function edit($id) {
        $data['tamu'] = $this->Tamu_model->get_tamu($id);
        
        if ($this->input->post()) {
            $update_data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kesiapa' => $this->input->post('kesiapa'),
                'keperluan' => $this->input->post('keperluan'),
                'asal_instansi' => $this->input->post('asal_instansi'),
                'waktu' => $this->input->post('waktu'),
                'ttd' => $this->input->post('ttd')
            );
            
            $this->Tamu_model->update_tamu($id, $update_data);
            
            // Redirect ke halaman tampilan detail tamu atau halaman lain yang sesuai
            redirect('beranda');
        }
        
        $this->load->view('edit_tamu', $data);
    }

    
}
