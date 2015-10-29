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
        $this->form_validation->set_rules(
            'nama_kuliner',
            'Nama Kuliner',
            'trim|required|is_unique[kuliner.nama_kuliner]|xss_clean'
            );

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kuliner-" . time();

           // Validasi Tipe File
            if ( ! $this->upload->do_upload('image')){

                $error = $this->upload->display_errors();

                $data['error'] = $error;
            }else{
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
        }
        $this->load->view('kuliner/add_v', $data);
    }

    public function edit($id = "")
    {
        $this->load->model('kabkot_m');
        $this->load->helper('file');
        $idup = $this->input->post('id');
        $data['kabkot'] = $this->kabkot_m->get();
        $data['idkk'] = $this->km->get_kabkotid_by_id($id);
        $data['title'] = "Ubah Data Kuliner";
        $data['error'] = "";
        $data['data'] = $this->km->get_by_id($id);
        $this->form_validation->set_rules(
            'nama_kuliner',
            'Nama Kabupaten / Kota',
            'trim|required|xss_clean'
            );

        $filename = $data['data']->gambar;

        if ($this->form_validation->run() === false) {
            $data['error'] = validation_errors();
        } else {
            $config['upload_path'] = './uploads/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = "kuliner-" . time();
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image') === false) {
                $dataup = array(
                    'nama_kuliner' => $this->input->post('nama_kuliner'),
                    'keterangan' => $this->input->post('keterangan'),
                     'id_kabkot'  => $this->input->post('idkabkot'),
                );
            } else {
                delete_files(base_url("uploads/gambar/" . $filename));

                $img = $this->upload->data();
                $image = $img['file_name'];

                $dataup = array(
                    'nama_kuliner' => $this->input->post('nama_kuliner'),
                    'keterangan' => $this->input->post('keterangan'),
                     'id_kabkot'  => $this->input->post('idkabkot'),
                    'gambar' => $image,
                );
            }

            $this->db->update('kuliner', $dataup, array('id_kuliner' => $idup));
            redirect(base_url('kuliner'));
        }

        $this->load->view('kuliner/edit_v', $data);
    }

    public function delete($id = "")
    {
        $this->km->delete($id);
        redirect(base_url('kuliner'));
    }

}

/* End of file kuliner.php */
/* Location: ./application/controllers/kuliner.php */
