<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuliner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kuliner_m', 'km');
        $this->load->model('kabkot_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Kuliner";
        $data['data'] = $this->km->get();
        $this->load->view('kuliner/index_v', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Kuliner";
        $data['error'] = "";
        $data['kabkot'] = $this->kabkot_m->get();
        $this->form_validation->set_rules('nama_kuliner', 'Nama Kuliner', 'trim|required|xss_clean');

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kuliner-" . time();
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $img = $this->upload->data();

            $image = $img['file_name'];

            $data = array(
                'nama_kuliner' => $this->input->post('nama_kuliner'),
                'id_kabkot' => $this->input->post('idkabkot'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $image,
            );

            $this->db->insert('kuliner', $data);
            redirect(base_url('kuliner'), 'refresh');
        }

        $this->load->view('kuliner/add_v', $data);
    }

}

/* End of file kuliner.php */
/* Location: ./application/controllers/kuliner.php */
