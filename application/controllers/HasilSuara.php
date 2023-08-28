<?php
class HasilSuara extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('HasilSuara_model');
    }

    public function index() {
        $data['daftar_calon'] = $this->HasilSuara_model->getPerolehanSuara();
        $this->load->view('hasil_suara_view', $data);
    }
}
?>
