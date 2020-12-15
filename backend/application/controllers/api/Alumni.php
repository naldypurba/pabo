<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Alumni extends REST_Controller
{
    public function __construct()

    {
       parent::__construct();
       $this->load->model('Alumni_model');

    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null){
            $alumni = $this->Alumni_model->getAlumni();
        } else {
            $alumni = $this->Alumni_model->getAlumni($id);
        }

        if ($alumni){
            $this->response([
                'status' => true,
                'data' => $alumni
            ], REST_Controller::HTTP_OK);

        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Id Tidak Ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }
	
		public function index_post(){
        $data = [
            "id"           		=> $this->post('id'),
            "namalengkap"  		=> $this->post('namalengkap'), 
            "jeniskelamin"     	=> $this->post('jeniskelamin'), 
            "tahunlulus"      	=> $this->post('tahunlulus'),
            "nomorhp"           => $this->post('nomorhp'), 
            "alamat"			=> $this->post('alamat'),
            "universitas"       => $this->post('universitas'), 
            "pekerjaan"        => $this->post('pekerjaan'),
        ];

        if($this->Alumni_model->insertAlumni($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'Data Alumni berhasil diinput',
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data Alumni gagal diinput',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

		 public function index_put(){
		$id               		= $this->put('id'); 
        $data = [
            "id"           		=> $this->put('id'),
            "namalengkap"  		=> $this->put('namalengkap'), 
            "jeniskelamin"     	=> $this->put('jeniskelamin'), 
            "tahunlulus"      	=> $this->put('tahunlulus'),
            "nomorhp"           => $this->put('nomorhp'), 
            "alamat"			=> $this->put('alamat'),
            "universitas"       => $this->put('universitas'), 
            "pekerjaan"        => $this->put('pekerjaan'),
        ];

        if($this->Alumni_model->updateAlumni($data,$id) > 0){
            $this->response([
                'status' => true,
                'message' => 'Data Alumni Berhasil Diupdate',
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data Alumni Gagal Diupdate',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null){
            $this->response([
                'status' => false,
                'message' => 'Data Id Kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->Alumni_model->deleteAlumni($id) > 0) {
            //Ok
         $this->response([
                'status'=> true,
                'message' => 'Data Alumni Berhasil dihapus'   
            ], REST_Controller::HTTP_OK);
            } else {
             // id not found
             $this->response([
                'status' => false,
                'message' => 'Data Id Tidak Ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

}
