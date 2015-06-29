<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkot_m extends CI_Model
{

    public $table = 'kabkot';
    public $primarykey = 'id_kabkot';

    public function count()
    {
        $data = $this->db->get_where($this->table)->num_rows();
        return $data;
    }

    public function get()
    {
        $data = $this->db->order_by('nama_kabkot', 'asc')->get($this->table)->result();
        return $data;
    }

    public function get_name($id)
    {
        $this->db->select('nama_kabkot');
        $data = $this->db->get_where($this->table, array('id_kabkot' => $id))->row();
        return $data->nama_kabkot;
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

/* End of file kabkot_m.php */
/* Location: ./application/models/kabkot_m.php */
