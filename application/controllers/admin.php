<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        } else {
            redirect('admin/dashboard', 'refresh');
        }
    }

    public function dashboard()
    {
        $data['title'] = "Welcome";
        $this->load->view('admin/index_v', $data);
    }

    public function login()
    {
        if ($this->session->userdata('username') != '') {
            redirect(base_url(), 'admin/dashboard');
        } else {
            $this->load->library('form_validation');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');
            $sql = "select * from `user` where `username`='$username' && `password`='$password'";
            $result = $this->db->query($sql);
            $row = $result->row();
            $data['error'] = '';

            if ($this->form_validation->run() == false) {
                $data['error'] .= validation_errors();
                $this->load->view('login', $data);
            } else {
                $hasil = $this->user_m->login_user();

                switch ($hasil) {
                    case 'incorrect_password':
                        $data['error'] .= "Password Salah";
                        $this->load->view('login', $data);
                        break;
                    case 'username_not_found':
                        $data['error'] .= "User tidak ditemukan";
                        $this->load->view('login', $data);
                        break;
                    case 'logged_in':
                        redirect('admin/dashboard');
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $sess_data = array(
            'username' => '',
            'level' => '',
            'address' => '',
            'phone' => '',
            'logged_in' => '',
        );
        $this->session->unset_userdata($sess_data);
        redirect(base_url(), 'refresh');
        exit();
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
