<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_m extends CI_Model
{

    public $table = 'wisata';
    public $primarykey = 'id_wisata';

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

    public function get_by_id($id)
    {
        $data = $this->db->get_where($this->table, array($this->primarykey => $id))->row();

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
        $this->db->delete($this->table, array($this->primarykey => $id));
    }
}

/* End of file wisata_m.php */
/* Location: ./application/models/wisata_m.php */
