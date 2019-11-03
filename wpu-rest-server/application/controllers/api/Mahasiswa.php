<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
        }
    
        function __construct()
        {
            // Construct the parent class
            parent::__construct();
            $this->__resTraitConstruct();
            $this->load->model('Mahasiswa_model','mahasiswa');
    
        }
    

     public function index_get(){
        $nama = $this->get('nama');
        //$id = $this->get('id');
        if ( $nama === null){
            $mahasiswa = $this->mahasiswa->getNamaMahasiswa();
        }else{
            $mahasiswa = $this->mahasiswa->getNamaMahasiswa($nama);
        }
       
        if($mahasiswa){
            $this->response($mahasiswa, 200);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'No users were found'
            ], 404); 
        }
     }

     public function index_delete(){
         $id = $this->delete('id');
         if ($id === null){
         
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], 400);    
        }
        else{
            if($this->mahasiswa->deleteMahasiswa($id) > 0){
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], 204); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], 404); 
            }
        }
     }

        public function index_post(){

            $data = [
                'nrp' => $this->post('nrp'),
                'nama' => $this->post('nama'),
                'email' => $this->post('email'),
                'jurusan' => $this->post('jurusan')
            ];

        if ($this->mahasiswa->createMahasiswa($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'data has been created'
            ], 201);  
            }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create data'
            ], 400);  
            }
              

        }
        public function index_put(){
            $id = $this->put('id');
            $data = [
                'nrp' => $this->put('nrp'),
                'nama' => $this->put('nama'),
                'email' => $this->put('email'),
                'jurusan' => $this->put('jurusan')
            ];
            if ($this->mahasiswa->updateMahasiswa($data, $id) > 0){
                $this->response([
                    'status' => true,
                    'message' => 'data has been updated'
                ], 201);  
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'failed to updated data'
                ], 400);  
                }
        }
    }
