<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Wisata extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_wisata_m', 'wm');

    }

    public function get_kabkot_get()
    {
        if (empty($this->get('offset'))) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit = $this->get('limit'))) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        $this->response(array('status' => 1, 'kabkot' => $this->wm->get_kabkot($offset, $limit)));
    }

    public function get_wisata_get()
    {
        if (empty($this->get('offset'))) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit = $this->get('limit'))) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        if (!empty($this->get('idkabkot'))) {
            if ($this->wm->count_wisata($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_wisata($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_wisata($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    public function get_kuliner_get()
    {
        if (empty($this->get('offset'))) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit = $this->get('limit'))) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        if (!empty($this->get('idkabkot'))) {
            if ($this->wm->count_kuliner($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_kuliner($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_kuliner($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    public function get_kerajinan_get()
    {
        if (empty($this->get('offset'))) {
            $offset = 0;
        } else {
            $offset = $this->get('offset');
        }

        if (empty($limit = $this->get('limit'))) {
            $limit = 10;
        } else {
            $limit = $this->get('limit');
        }

        if (!empty($this->get('idkabkot'))) {
            if ($this->wm->count_kerajinan($this->get('idkabkot')) == 0) {
                $this->response(array('status' => 'error', 'message' => 'Tidak ada data'));
            } else {
                $this->response(array('status' => 'success', 'data' => $this->wm->get_kerajinan($this->get('idkabkot'), $offset, $limit), 'total' => $this->wm->count_kerajinan($this->get('idkabkot'))));
            }
        } else {
            $this->response(array('status' => 'error', 'message' => 'Isi ID Kabkot'));
        }
    }

    public function show_detail_get()
    {
        if (!empty($this->get('id')) && !empty($this->get('segment'))) {
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
}

/* End of file feed.php */
/* Location: ./application/controllers/api/feed.php */
