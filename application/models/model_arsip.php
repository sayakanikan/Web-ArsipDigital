<?php 
class Model_Arsip extends CI_Model{
    public function get_data($table){
        return $this->db->get($table);
    }

    public function get_where($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ambil_id_dokumen($id){
        $hasil = $this->db->where('id_dok', $id)->get('tb_dokumen');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function ambil_id_admin($id){
        $hasil = $this->db->where('id_admin', $id)->get('tb_admin');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function ambil_id_user($id){
        $hasil = $this->db->where('id_user', $id)->get('tb_user');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function hitung_admin(){
        $query = $this->db->get('tb_admin');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function hitung_dokumen(){
        $query = $this->db->get('tb_dokumen');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function hitung_user(){
        $query = $this->db->get('tb_user');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_dokumen');
        $this->db->like('nama_dok', $keyword);
        $this->db->or_like('kode_jenis', $keyword);
        $this->db->or_like('kode_dok', $keyword);
        $this->db->or_like('tanggal_input', $keyword);
        $this->db->or_like('tahun', $keyword);
        return $this->db->get()->result();
    }

    public function get_admin_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->or_like('ttl', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('telpon', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get()->result();
    }

    public function get_user_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->or_like('ttl', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('telpon', $keyword);
        $this->db->or_like('bagian', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get()->result();
    }

    public function downloadDokumen($id){
        $query = $this->db->get_where('tb_dokumen', array('id_dok' => $id));
        return $query->row_array();
    }

    public function cek_login(){
        $username   = set_value('username');
        $password   = set_value('password');

        $result = $this->db
                       ->where('username', $username)
                       ->where('password', md5($password))
                       ->limit(1)
                       ->get('tb_user');

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function cek_login_admin(){
        $username   = set_value('username');
        $password   = set_value('password');

        $result = $this->db
                       ->where('username', $username)
                       ->where('password', md5($password))
                       ->limit(1)
                       ->get('tb_admin');

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function update_password($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function cek_username(){
        $username   = set_value('username');

        $result     = $this->db
                           ->where('username', $username)
                           ->limit(1)
                           ->get('tb_admin');
        
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function cek_username_user(){
        $username   = set_value('username');

        $result     = $this->db
                           ->where('username', $username)
                           ->limit(1)
                           ->get('tb_user');
        
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }
}
?>