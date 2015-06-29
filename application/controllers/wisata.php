<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('wisata_m', 'wm');
        $this->load->model('kabkot_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Wisata";
        $data['data'] = $this->wm->get();
        $this->load->view('wisata/index_v', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Wisata";
        $data['error'] = "";
        $data['kabkot'] = $this->kabkot_m->get();
        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'trim|required|xss_clean');

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "wisata-" . time();
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $img = $this->upload->data();

            $image = $img['file_name'];

            $data = array(
                'nama_wisata' => $this->input->post('nama_wisata'),
                'id_kabkot' => $this->input->post('idkabkot'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $image,
            );

            $this->db->insert('wisata', $data);
            redirect(base_url('wisata'), 'refresh');
        }

        $this->load->view('wisata/add_v', $data);
    }

}

/* End of file wisata.php */
/* Location: ./application/controllers/wisata.php */
