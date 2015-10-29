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
        $this->form_validation->set_rules(
            'nama_wisata',
            'Nama Wisata',
            'trim|required|is_unique[wisata.nama_wisata]|xss_clean'
            );

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "wisata-" . time();
            $this->load->library('upload', $config);

            // Validasi Tipe File
            if ( ! $this->upload->do_upload('image')){

                $error = $this->upload->display_errors();

                $data['error'] = $error;
            }else{
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
        }

        $this->load->view('wisata/add_v', $data);
    }

    public function edit($id = "")
    {
        $this->load->model('kabkot_m');
        $this->load->helper('file');
        $idup = $this->input->post('id');
        $data['kabkot'] = $this->kabkot_m->get();
        $data['idkk'] = $this->wm->get_kabkotid_by_id($id);
        $data['title'] = "Ubah Data wisata";
        $data['error'] = "";
        $data['data'] = $this->wm->get_by_id($id);
        $this->form_validation->set_rules(
            'nama_wisata',
            'Nama Kabupaten / Kota',
            'trim|required|xss_clean'
            );

        $filename = $data['data']->gambar;

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "wisata-" . time();
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image') === false) {
                $dataup = array(
                    'nama_wisata' => $this->input->post('nama_wisata'),
                    'keterangan' => $this->input->post('keterangan'),
                    'id_kabkot'  => $this->input->post('idkabkot'),
                );
            } else {
                delete_files(base_url("uploads/gambar/" . $filename));
                $img = $this->upload->data();
                $image = $img['file_name'];

                $dataup = array(
                    'nama_wisata' => $this->input->post('nama_wisata'),
                    'keterangan' => $this->input->post('keterangan'),
                    'id_kabkot'  => $this->input->post('idkabkot'),
                    'gambar' => $image,
                );
            }

            $this->db->update('wisata', $dataup, array('id_wisata' => $idup));
            redirect(base_url('wisata'));
        }

        $this->load->view('wisata/edit_v', $data);
    }

    public function delete($id = "")
    {
        $this->wm->delete($id);
        redirect(base_url('wisata'));
    }

}

/* End of file wisata.php */
/* Location: ./application/controllers/wisata.php */
