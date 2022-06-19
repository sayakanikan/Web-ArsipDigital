<?php 
class Jenis extends CI_Controller{
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
        $this->load->view('admin/jenis_dokumen', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_jenis(){
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_tambah_jenis');
        $this->load->view('template_admin/footer');
    }

    public function tambah_jenis_aksi() {
        $jenis_dok            = $this->input->post('jenis_dok');
        $kode_jenis           = $this->input->post('kode_jenis');

        $data = array(
            'jenis_dok'          => $jenis_dok,
            'kode_jenis'         => $kode_jenis
        );

        $this->model_arsip->insert_data($data,'tb_jenis');
        $this->session->set_flashdata('pesan4','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Jenis Dokumen Baru Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/jenis');
    }

    public function edit($id) {
        $where = array('id_jenis' => $id);
        $data['jenis'] = $this->db->query("SELECT * FROM tb_jenis WHERE id_jenis = '$id'")->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_edit_jenis', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit_jenis_aksi() {
        $id            = $this->input->post('id_jenis');
        $jenis_dok     = $this->input->post('jenis_dok');
        $kode_jenis    = $this->input->post('kode_jenis');

        $data = array(
            'jenis_dok'     => $jenis_dok,
            'kode_jenis'    => $kode_jenis
        );

        $where = array(
            'id_jenis'       => $id
        );

        $this->model_arsip->update_data($where, $data, 'tb_jenis');
        $this->session->set_flashdata('pesan4','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Jenis Dokumen Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/jenis');
    }

    public function hapus($id){
        $where = array('id_jenis' => $id);
        $this->model_arsip->delete_data($where, 'tb_jenis');
        $this->session->set_flashdata('pesan4','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Jenis Dokumen Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/jenis');
    }
}
?>