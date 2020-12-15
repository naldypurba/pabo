<?php
use GuzzleHttp\Client;

class Alumni_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client(
            [
                'base_uri'=>'http://localhost/alumniraya/backend/index.php/api/'
            ]
        );


    }

    public function getAllAlumni()
    {
        $sessionAPIKEY= $this->session->userdata('login');

        //return $this->db->get('Alumni')->result_array();
        $response = $this->_client->request('GET', 'alumni',
             [
                 'query'=>[
                     //'access-key'=>'restAlumni123'
                     'access-key'=> $sessionAPIKEY
                 ]
             ]
        );
        $result=json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }
    public function getAlumniById($id)
    {
        //return $this->db->get_where('Alumni', ['id' => $id])->row_array();
        $sessionAPIKEY= $this->session->userdata('login');
        $response = $this->_client->request('GET', 'alumni',
             [
                 'query'=>[
                     //'access-key'=>'restAlumni123',
                     'access-key'=> $sessionAPIKEY,
                     'id'=> $id
                 ]
             ]
        );
        $result=json_decode($response->getBody()->getContents(),true);
        return $result['data'][0];
    }

    public function tambahDataAlumni()
    {
        $sessionAPIKEY= $this->session->userdata('login');
        $data = [
            "namalengkap"	=> $this->input->post('namalengkap', true),
			"jeniskelamin"  => $this->input->post('jeniskelamin', true), 
            "tahunlulus"    => $this->input->post('tahunlulus', true),
            "nomorhp"       => $this->input->post('nomorhp', true), 
            "alamat"		=> $this->input->post('alamat', true),
            "universitas"   => $this->input->post('universitas', true), 
            "pekerjaan"     => $this->input->post('pekerjaan', true),
            //"access-key"=>'restAlumni123'
            "access-key"=> $sessionAPIKEY
        ];

        //$this->db->insert('Alumni', $data);
        $response= $this->_client->request('POST','alumni',
            [
                'form_params'=>$data
            ]
        );
        $result=json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function hapusDataAlumni($id)
    {
        // $this->db->where('id', $id);
       // $this->db->delete('Alumni', ['id' => $id]);
       $sessionAPIKEY= $this->session->userdata('login');
       $response= $this->_client->request('DELETE','alumni',
            [
                'form_params'=>[
                    'id'=>$id,
                    //'access-key'=>'restAlumni123'
                    'access-key'=> $sessionAPIKEY
                ]
            ]
        );

        $result=json_decode($response->getBody()->getContents(),true);
        return $result;
    }



    public function ubahDataAlumni()
    {
        $sessionAPIKEY= $this->session->userdata('login');
        $data = [
            "namalengkap" => $this->input->post('namalengkap', true),
			"jeniskelamin" => $this->input->post('jeniskelamin', true), 
            "tahunlulus" => $this->input->post('tahunlulus', true),
            "nomorhp" => $this->input->post('nomorhp', true), 
            "alamat" => $this->input->post('alamat', true),
            "universitas" => $this->input->post('universitas', true), 
            "pekerjaan" => $this->input->post('pekerjaan', true),
            //"access-key"=>'restAlumni123',
            'access-key'=> $sessionAPIKEY,
            "id"=>$this->input->post('id',true),
        ];

        //$this->db->where('id', $this->input->post('id'));
        //$this->db->update('Alumni', $data);
        $response= $this->_client->request('PUT','Alumni',
            [
                'form_params'=>$data
            ]
        );
        $result=json_decode($response->getBody()->getContents(),true);
        return $result;

    }

    public function cariDataAlumni()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('namalengkap', $keyword);
        $this->db->or_like('jeniskelamin', $keyword);
        $this->db->or_like('tahunlulus', $keyword);
        $this->db->or_like('nomorhp', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('universitas', $keyword);
		$this->db->or_like('pekerjaan', $keyword);		
        return $this->db->get('alumni')->result_array();
    }
}
