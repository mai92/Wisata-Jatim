<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerajinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kerajinan_m', 'kr');
        $this->load->model('kabkot_m');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {redirect('admin/login');}
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {redirect('admin/login');}
        $data['title'] = "Kerajinan";
        $data['data'] = $this->kr->get();

        $this->load->view('kerajinan/index_v', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Kerajinan";
        $data['error'] = "";
        $data['kabkot'] = $this->kabkot_m->get();

        $this->form_validation->set_rules(
            'nama_kerajinan',
            'Nama Kabupaten / Kota',
            'trim|required|is_unique[kerajinan.nama_kerajinan]|xss_clean'
            );

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kerajinan-" . time();
            $this->load->library('upload', $config);

            // Validasi Tipe File
            if ( ! $this->upload->do_upload('image')){

                $error = $this->upload->display_errors();

                $data['error'] = $error;
            }else{
                $img = $this->upload->data();

                $image = $img['file_name'];

                $data = array(
                    'nama_kerajinan' => $this->input->post('nama_kerajinan'),
                    'id_kabkot' => $this->input->post('idkabkot'),
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $image,
                );

                $this->db->insert('kerajinan', $data);
                redirect(base_url('kerajinan'), 'refresh');
            }

        }

        $this->load->view('kerajinan/add_v', $data);
    }

    public function edit($id = "")
    {
        $this->load->model('kabkot_m');
        $this->load->helper('file');
        $idup = $this->input->post('id');
        $data['kabkot'] = $this->kabkot_m->get();
        $data['idkk'] = $this->kr->get_kabkotid_by_id($id);
        $data['title'] = "Ubah Data Kerajinan";
        $data['error'] = "";
        $data['data'] = $this->kr->get_by_id($id);
        $this->form_validation->set_rules(
            'nama_kerajinan',
            'Nama Kabupaten / Kota',
            'trim|required|xss_clean'
            );

        $filename = $data['data']->gambar;

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kerajinan-" . time();
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image') === false) {
                $dataup = array(
                    'nama_kerajinan' => $this->input->post('nama_kerajinan'),
                    'keterangan' => $this->input->post('keterangan'),
                    'id_kabkot'  => $this->input->post('idkabkot'),
                );
            } else {
                delete_files(base_url("uploads/gambar/" . $filename));
                $img = $this->upload->data();
                $image = $img['file_name'];

                $dataup = array(
                    'nama_kerajinan' => $this->input->post('nama_kerajinan'),
                    'keterangan' => $this->input->post('keterangan'),
                    'id_kabkot'  => $this->input->post('idkabkot'),
                    'gambar' => $image,
                );
            }

            $this->db->update('kerajinan', $dataup, array('id_kerajinan' => $idup));
            redirect(base_url('kerajinan'));
        }

        $this->load->view('kerajinan/edit_v', $data);
    }

    public function delete($id = "")
    {
        $this->kr->delete($id);
        redirect(base_url('kerajinan'));
    }

}

/* End of file kerajinan.php */
/* Location: ./application/controllers/kerajinan.php */
