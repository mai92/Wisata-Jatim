<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_wisata_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_kabkot($offset = 0, $limit = 10)
    {
        $query = "select * from kabkot order by nama_kabkot asc limit $offset,$limit";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function count_wisata($idkabkot = '')
    {
        $query = "select * from wisata where wisata.id_kabkot=$idkabkot";
        $data = $this->db->query($query)->num_rows();

        return $data;
    }

    public function get_wisata($idkabkot = '', $offset = 0, $limit = 10)
    {
        $query = "select w.id_wisata as id,k.id_kabkot,w.gambar,w.keterangan,w.nama_wisata as nama,k.nama_kabkot from wisata w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_kabkot=$idkabkot order by nama_wisata asc limit $offset,$limit";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function count_kuliner($idkabkot = '')
    {
        $query = "select * from kuliner where kuliner.id_kabkot=$idkabkot";
        $data = $this->db->query($query)->num_rows();

        return $data;
    }

    public function get_kuliner($idkabkot = '', $offset = 0, $limit = 10)
    {
        $query = "select w.id_kuliner as id,k.id_kabkot,w.gambar,w.keterangan,w.nama_kuliner as nama,k.nama_kabkot from kuliner w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_kabkot=$idkabkot order by nama_kuliner asc limit $offset,$limit";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function count_kerajinan($idkabkot = '')
    {
        $query = "select * from kerajinan where kerajinan.id_kabkot=$idkabkot";
        $data = $this->db->query($query)->num_rows();

        return $data;
    }

    public function get_kerajinan($idkabkot = '', $offset = 0, $limit = 10)
    {
        $query = "select w.id_kerajinan as id,k.id_kabkot,w.gambar,w.keterangan,w.nama_kerajinan as nama,k.nama_kabkot from kuliner w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_kabkot=$idkabkot order by nama_kerajinan asc limit $offset,$limit";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function detail_wisata($id)
    {
        $query = "select w.id_wisata as id,w.gambar,w.keterangan,w.nama_wisata as nama,k.nama_kabkot from wisata w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_wisata=$id order by nama_wisata asc";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function detail_kuliner($id)
    {
        $query = "select w.id_kuliner as id,w.gambar,w.keterangan,w.nama_kuliner as nama,k.nama_kabkot from kuliner w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_kuliner=$id order by nama_kuliner asc";
        $data = $this->db->query($query)->result();

        return $data;
    }

    public function detail_kerajinan($id)
    {
        $query = "select w.id_kerajinan as id,w.gambar,w.keterangan,w.nama_kerajinan as nama,k.nama_kabkot from kerajinan w join kabkot k where w.id_kabkot=k.id_kabkot and w.id_kerajinan=$id order by nama_kerajinan asc";
        $data = $this->db->query($query)->result();

        return $data;
    }

}

/* End of file wisata_m.php */
/* Location: ./application/models/wisata_m.php */
