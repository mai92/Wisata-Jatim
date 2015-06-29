<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerajinan_m extends CI_Model
{

    public $table = 'kerajinan';
    public $primarykey = 'id_kerajinan';

    public function count()
    {
        $data = $this->db->get_where($this->table)->num_rows();
        return $data;
    }

    public function get()
    {
        $data = $this->db->get($this->table)->result();

        return $data;
    }
    public function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {
        $this->db->delete($this->table, array($primarykey => $id));
    }

}

/* End of file kerajinan_m.php */
/* Location: ./application/models/kerajinan_m.php */
