<?php 
use GuzzleHttp\Client;


class Inventaris_model extends CI_model {

    private $_client;

    public function __construct(){
        $this->_client = new Client([
            'base_uri' => 'http://localhost/web-inven/wpu-rest-server/api/',

        ]);

    }

    public function getAllKomponen()
    {
       // return $this->db->get('mahasiswa')->result_array();
       

        $response = $this->_client->request('GET', 'inventaris');

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function tambahDataKomponen()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "jumlah" => $this->input->post('jumlah', true),
            "tanggal" => $this->input->post('tanggal', true),
            "tempat" => $this->input->post('tempat', true)
        ];
        $response = $this->_client->request('POST', 'inventaris', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
       // $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataKomponen($id)
    {
        // $this->db->where('id', $id);
        $response = $this->_client->request('DELETE', 'inventaris', [
            'form_params' => [
                'id' => $id 
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        // $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function getKomponenById($id)
    {
        //return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
       

        $response = $this->_client->request('GET', 'inventaris',['query' => ['id' => $id] ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result[0];
    }
    public function ubahDataKomponen()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "jumlah" => $this->input->post('jumlah', true),
            "tanggal" => $this->input->post('tanggal', true),
            "tempat" => $this->input->post('tempat', true),
            "id" => $this->input->post('id', true)
        ];
        $response = $this->_client->request('PUT', 'inventaris', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
       // $this->db->where('id', $this->input->post('id'));
        //$this->db->update('mahasiswa', $data);
    }

    public function cariDataKomponen()
    {
        $nama = $this->input->post('keyword', true);
        $response = $this->_client->request('GET', 'inventaris',['query' => ['nama' => $nama] ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
        
    }
    public function cariDataKomponenByMeja()
    {
        $tempat = $this->input->post('b5', true);
        $response = $this->_client->request('GET', 'inventaris',['query' => ['tempat' => $tempat] ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
        
    }
    public function cariDataKomponenByPandora()
    {
        $tempat = $this->input->post('pandora', true);
        $response = $this->_client->request('GET', 'inventaris',['query' => ['tempat' => $tempat] ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
        
    }
} 