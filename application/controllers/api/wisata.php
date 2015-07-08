<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Wisata extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_wisata_m', 'wm');

    }

    /**
     * [get_kabkot_get fungsi menampilkan data kabupaten / kota ]
     * @return [type] [description]
     */
    public function get_kabkot_get()
    {
        $offset = $this->get('offset');
        $limit = $this->get('limit');
        $idkabkot = $this->get('idkabkot');

        if (empty($offset)) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit)) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        $this->response(array('status' => 1, 'kabkot' => $this->wm->get_kabkot($offset, $limit)));
    }

    /**
     * [get_wisata_get fungsi mendapatkan daftar wisata yang ada berdasarkan id kabupaten/kota]
     * @return [type] [description]
     */
    public function get_wisata_get()
    {
        $offset = $this->get('offset');
        $limit = $this->get('limit');
        $idkabkot = $this->get('idkabkot');

        if (empty($offset)) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit)) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        if (!empty($idkabkot)) {
            if ($this->wm->count_wisata($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_wisata($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_wisata($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    /**
     * [get_kuliner_get fungsi mendapatkan daftar kuliner yang ada berdasarkan id kabupaten/kota]
     * @return [type] [description]
     */
    public function get_kuliner_get()
    {
        $offset = $this->get('offset');
        $limit = $this->get('limit');
        $idkabkot = $this->get('idkabkot');

        if (empty($offset)) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit)) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }
        if (!empty($idkabkot)) {
            if ($this->wm->count_kuliner($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_kuliner($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_kuliner($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    /**
     * [get_kerajinan_get fungsi mendapatkan daftar kerajinan yang ada berdasarkan id kabupaten/kota]
     * @return [type] [description]
     */
    public function get_kerajinan_get()
    {
        $offset = $this->get('offset');
        $limit = $this->get('limit');
        $idkabkot = $this->get('idkabkot');

        if (empty($offset)) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit)) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        if (!empty($idkabkot)) {
            if ($this->wm->count_kerajinan($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_kerajinan($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_kerajinan($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    /**
     * [show_detail_get menampilkan data detail dari kuliner,wisata,kerajinan dengan segment]
     * @return [type] [description]
     */
    public function show_detail_get()
    {
        $id = $this->get('id');
        $segment = $this->get('segment');
        if (!empty($id) && !empty($segment)) {
            if ($this->get('segment') == "wisata") {
                $this->response(array('status' => 'success', 'detail' => $this->wm->detail_wisata($this->get('id'))));
            } else if ($this->get('segment') == "kuliner") {
                $this->response(array('status' => 'success', 'detail' => $this->wm->detail_kuliner($this->get('id'))));
            } else if ($this->get('segment') == "kerajinan") {
                $this->response(array('status' => 'success', 'detail' => $this->wm->detail_kerajinan($this->get('id'))));
            } else {
                $this->response(array('status' => 'error', 'message' => 'Segment Tersedia: wisata, kuliner, kerajinan'));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID + segment'));
        }
    }

    /**
     * [search_post API untuk pencarian wisata,kuliner,kerajinan di android]
     * @return [type] [description]
     */
    public function search_post()
    {
        $keyword = $this->post('keyword');

        $sekul = $this->wm->search_kuliner($keyword);
        $seker = $this->wm->search_kerajinan($keyword);
        $sewis = $this->wm->search_wisata($keyword);

        if (empty($keyword)) {
            $this->response(array('status' => 0, 'message' => 'Isi Keywordnya'));
        } else {
            $this->response(array('wisata' => $sewis, 'kuliner' => $sekul, 'kerajinan' => $seker));
        }
    }
}

/* End of file feed.php */
/* Location: ./application/controllers/api/feed.php */
