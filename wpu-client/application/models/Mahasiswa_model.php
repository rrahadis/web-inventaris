<?php 
use GuzzleHttp\Client;


class Mahasiswa_model extends CI_model {

    private $_client;

    public function __construct(){
        $this->_client = new Client([
            'base_uri' => 'http://localhost/web-inven/wpu-rest-server/api/',

        ]);

    }

    public function getAllMahasiswa()
    {
       // return $this->db->get('mahasiswa')->result_array();
       

        $response = $this->_client->request('GET', 'mahasiswa');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];
        $response = $this->_client->request('POST', 'mahasiswa', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
       // $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('id', $id);
        $response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'id' => $id 
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        // $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function getMahasiswaById($id)
    {
        //return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
       

        $response = $this->_client->request('GET', 'mahasiswa',['query' => ['id' => $id] ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result[0];
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "id" => $this->input->post('id', true)
        ];
        $response = $this->_client->request('PUT', 'mahasiswa', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
       // $this->db->where('id', $this->input->post('id'));
        //$this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $nama = $this->input->post('keyword', true);
        $response = $this->_client->request('GET', 'mahasiswa',['query' => ['nama' => $nama] ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
} 