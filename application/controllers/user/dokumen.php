<?php 
class Dokumen extends CI_Controller {
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2'){
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
        $data['dokumen'] = $this->model_arsip->get_data('tb_dokumen')->result();
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar');
        $this->load->view('user/dokumen', $data);
        $this->load->view('template_user/footer');
    }

    public function detail($id) {
        $data['detail'] = $this->model_arsip->ambil_id_dokumen($id);
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar');
        $this->load->view('user/detail_dokumen', $data);
        $this->load->view('template_user/footer');
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $data['dokumen'] = $this->model_arsip->get_keyword($keyword);
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar');
        $this->load->view('user/dokumen', $data);
        $this->load->view('template_user/footer');
    }

    public function filter() {
        $jenis_dok = $this->input->post('jenis_dok');
        $tahun = $this->input->post('tahun');

        if($this->form_validation->run() == FALSE){
            $this->load->view('template_user/header');
            $this->load->view('template_user/sidebar');
            $this->load->view('user/dokumen');
            $this->load->view('template_user/footer');
        }else{
            $data['filter'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.jenis_dok = jen.jenis_dok AND dok.jenis_dok = '$jenis_dok' AND number(tahun) = '$tahun'")->result();
            $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
            $this->load->view('template_user/header');
            $this->load->view('template_user/sidebar');
            $this->load->view('user/filter_dokumen', $data);
            $this->load->view('template_user/footer');
        }
    }

    public function unduh($id){
        $this->load->helper('download');
        $fileDokumen = $this->model_arsip->downloadDokumen($id);
        $file = 'assets/upload/file_arsip/'.$fileDokumen['file'];
        force_download($file, NULL);
        $this->session->set_flashdata('pesan2','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Dokumen Didownload.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
}
?>