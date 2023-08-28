<?php
class HasilSuara_model extends CI_Model {
    public function getPerolehanSuara() {
        $query = $this->db->select('id_calon, SUM(jumlah_suara) as total_suara')
                          ->group_by('id_calon')
                          ->get('tb_hasil_suara');
        return $query->result_array();
    }
}
?>
