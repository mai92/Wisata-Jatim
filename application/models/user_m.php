<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $sql = "select * from `user` where `username`='$username' limit 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if ($row->password === md5($password)) {
                $session_data = array(
                    'username' => $row->username,
                );
                $this->set_session($session_data);
                return 'logged_in';
            } else {
                return 'incorrect_password';
            }
        } else {
            return 'username_not_found';
        }
    }

    private function set_session($session_data)
    {
        $sess_data = array(
            'username' => $session_data['username'],
            'logged_in' => 1,
        );

        $this->session->set_userdata($sess_data);

    }

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */
