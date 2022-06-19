<?php 
class Dokumen extends CI_Controller{
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
        $data['dokumen'] = $this->model_arsip->get_data('tb_dokumen')->result();
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_dokumen() {
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_tambah_dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_dokumen_aksi() {
        $nama_dok       = $this->input->post('nama_dok');
        $kode_jenis     = $this->input->post('kode_jenis');
        $kode_dok       = $this->input->post('kode_dok');
        $tanggal_input  = $this->input->post('tanggal_input');
        $tahun          = $this->input->post('tahun');
        $keterangan     = $this->input->post('keterangan');
        $file           = $_FILES['file']['name'];
        if($file=''){}else{
            $config['upload_path']      = 'assets/upload/file_arsip/';
            $config['allowed_types']    = 'jpg|jpeg|png|pdf';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file')){
                echo "File Gagal Diupload!";
            }else{
                $file = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_dok'      => $nama_dok,
            'kode_jenis'    => $kode_jenis,
            'kode_dok'      => $kode_dok,
            'tanggal_input' => $tanggal_input,
            'tahun'         => $tahun,
            'keterangan'    => $keterangan,
            'file'          => $file
        );

        $this->model_arsip->insert_data($data,'tb_dokumen');
        $this->session->set_flashdata('pesan2','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Dokumen Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dokumen');
    }

    public function edit($id) {
        $where = array('id_dok' => $id);
        $data['dokumen'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis = jen.kode_jenis AND dok.id_dok = '$id'")->result();
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_edit_dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit_dokumen_aksi() {
        $id             = $this->input->post('id_dok');
        $nama_dok       = $this->input->post('nama_dok');
        $kode_jenis     = $this->input->post('kode_jenis');
        $kode_dok       = $this->input->post('kode_dok');
        $tanggal_input  = $this->input->post('tanggal_input');
        $tahun          = $this->input->post('tahun');
        $keterangan     = $this->input->post('keterangan');
        $file           = $_FILES['file']['name'];
        if($file){
            $config['upload_path']      = 'assets/upload/file_arsip/';
            $config['allowed_types']    = 'jpg|jpeg|png|pdf|doc|rar|zip';

            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')){
                $file = $this->upload->data('file_name');
                $this->db->set('file', $file);
            }else{
                echo $this->upload->display_error();
            }
        }

        $data = array(
            'nama_dok'      => $nama_dok,
            'kode_jenis'    => $kode_jenis,
            'kode_dok'      => $kode_dok,
            'tanggal_input' => $tanggal_input,
            'tahun'         => $tahun,
            'keterangan'    => $keterangan,
        );

        $where = array(
            'id_dok'       => $id
        );

        $this->model_arsip->update_data($where, $data, 'tb_dokumen');
        $this->session->set_flashdata('pesan2','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Dokumen Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dokumen');
    }

    public function hapus($id) {
        $where = array('id_dok' => $id);
        $this->model_arsip->delete_data($where, 'tb_dokumen');
        $this->session->set_flashdata('pesan2','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Dokumen Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dokumen');
    }

    public function detail($id) {
        $data['detail'] = $this->model_arsip->ambil_id_dokumen($id);
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/detail_dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $data['dokumen'] = $this->model_arsip->get_keyword($keyword);
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function filter() {
        $kode_jenis = $this->input->post('kode_jenis');
        $tahun = $this->input->post('tahun');

        $data['filter'] = $this->db->query("SELECT * FROM tb_dokumen dok, tb_jenis jen WHERE dok.kode_jenis = jen.kode_jenis AND dok.kode_jenis = '$kode_jenis' AND dok.tahun = '$tahun'")->result();
        $data['jenis'] = $this->model_arsip->get_data('tb_jenis')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/filter_dokumen', $data);
        $this->load->view('template_admin/footer');
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