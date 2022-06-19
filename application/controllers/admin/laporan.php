<?php 
class Laporan extends CI_Controller{
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				redirect('welcome');
		}
	}

    public function index() {
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tampilkan_laporan(){
        $dari           = $this->input->post('dari');
        $sampai         = $this->input->post('sampai');
        $jenis_dokumen  = $this->input->post('jenis_dokumen');

        if($jenis_dokumen == '1'){
            $data['laporan'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis=jen.kode_jenis AND date(tanggal_input) >= '$dari' AND date(tanggal_input) <= '$sampai'")->result();
            $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/tampilkan_laporan', $data);
            $this->load->view('template_admin/footer');
        }else{
            $data['laporan'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis=jen.kode_jenis AND date(tanggal_input) >= '$dari' AND date(tanggal_input) <= '$sampai' AND dok.kode_jenis='$jenis_dokumen'")->result();
            $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/tampilkan_laporan', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function print_laporan(){
        $dari           = $this->input->get('dari');
        $sampai         = $this->input->get('sampai');
        $jenis_dokumen  = $this->input->get('jenis_dokumen');
        $data['title']   = "Print Laporan Arsip";
        if($jenis_dokumen == '1'){
            $data['laporan'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis=jen.kode_jenis AND date(tanggal_input) >= '$dari' AND date(tanggal_input) <= '$sampai'")->result();
            $this->load->view('template_admin/header', $data);
            $this->load->view('admin/print_laporan', $data);
        }else{
            $data['laporan'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis=jen.kode_jenis AND date(tanggal_input) >= '$dari' AND date(tanggal_input) <= '$sampai' AND dok.kode_jenis='$jenis_dokumen'")->result();
            $this->load->view('template_admin/header', $data);
            $this->load->view('admin/print_laporan', $data);
        }
    }
}
?>