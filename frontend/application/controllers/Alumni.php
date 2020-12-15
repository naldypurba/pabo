<?php

class Alumni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('login'))){
            redirect('login');
        }
        $this->load->model('Alumni_model');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $data['judul'] = 'Daftar Alumni';
        $data['alumni'] = $this->Alumni_model->getAllAlumni();
        if( $this->input->post('keyword') ) {
            $data['alumni'] = $this->Alumni_model->cariDataAlumni();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('alumni/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Alumni';

        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tahunlulus', 'Tahun Lulus', 'required');
		$this->form_validation->set_rules('nomorhp', 'Nomor Handphone', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Nama', 'required');
		$this->form_validation->set_rules('universitas', 'Nama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('alumni/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Alumni_model->tambahDataAlumni();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Alumni');
        }
    }

    public function hapus($id)
    {
        $this->Alumni_model->hapusDataAlumni($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('alumni');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Alumni';
        $data['alumni'] = $this->Alumni_model->getAlumniById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('alumni/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Alumni';
        $data['alumni'] = $this->Alumni_model->getAlumniById($id);
        $data['jeniskelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tahunlulus', 'Tahun Lulus', 'required');
		$this->form_validation->set_rules('nomorhp', 'Nomor Handphone', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Nama', 'required');
		$this->form_validation->set_rules('universitas', 'Nama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('alumni/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Alumni_model->ubahDataAlumni();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('alumni');
        }
    }

}
