<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kabkot_m', 'kk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Kabupaten & Kota";
        $data['data'] = $this->kk->get();

        $this->load->view('kabkot/index_v', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Kabupaten / Kota";
        $data['error'] = "";
        $this->form_validation->set_rules('nama_kabkot', 'Nama Kabupaten / Kota', 'trim|required|xss_clean');

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kabkot-" . time();
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $img = $this->upload->data();

            $image = $img['file_name'];

            $data = array(
                'nama_kabkot' => $this->input->post('nama_kabkot'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $image,
            );

            $this->db->insert('kabkot', $data);
            redirect(base_url('kabkot'), 'refresh');
        }

        $this->load->view('kabkot/add_v', $data);
    }

}

/* End of file kabkot.php */
/* Location: ./application/controllers/kabkot.php */
