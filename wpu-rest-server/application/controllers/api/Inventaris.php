<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Inventaris extends CI_Controller{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
        }
    
        function __construct()
        {
            // Construct the parent class
            parent::__construct();
            $this->__resTraitConstruct();
            $this->load->model('Inventaris_model','komponen');
    
        }

        public function index_get(){
            $id = $this->get('id');
            $nama = $this->get('nama');
            $tempat = $this->get('tempat');
            if($id === null && $nama === null && $tempat === null){
                $inventaris = $this->komponen->getInventaris();                  
            }
            elseif($id) {
             $inventaris = $this->komponen->getInventaris($id);   
            }
             elseif($nama) {
            $inventaris = $this->komponen->getNamaKomponen($nama);
             }
             elseif($tempat) {
            $inventaris = $this->komponen->getTempatKomponen($tempat);
             }


            if($inventaris){
                $this->response($inventaris, 200);
            }
            else
            {
                $this->response([
                    'status' => false,
                    'message' => 'Tidak ada komponen'
                ], 404); 
            }
         }

         public function index_delete(){
            $id = $this->delete('id');
            if ($id === null){
            
               $this->response([
                   'status' => false,
                   'message' => 'gagal di hapus'
               ], 400);    
           }
           else{
               if($this->komponen->deleteInventaris($id) > 0){
                   $this->response([
                       'status' => true,
                       'id' => $id,
                       'message' => 'Terhapus'
                   ], 204); 
               }else{
                   $this->response([
                       'status' => false,
                       'message' => 'id tidak ditemukan.'
                   ], 404); 
               }
           }
        }

        public function index_post(){

            $data = [
                'nama' => $this->post('nama'),
                'jumlah' => $this->post('jumlah'),
                'tanggal' => $this->post('tanggal'),
                'tempat' => $this->post('tempat')
            ];
            if ($this->komponen->createInventaris($data) > 0){
                $this->response([
                    'status' => true,
                    'message' => 'data telah dibuat.'
                ], 201);  
                }else{
                $this->response([
                    'status' => false,
                    'message' => 'gagal membuat data.'
                ], 400);  
                }
                  
            }

            public function index_put(){
                $id = $this->put('id');
                $data = [
                    'nama' => $this->put('nama'),
                    'jumlah' => $this->put('jumlah'),
                    'tanggal' => $this->put('tanggal'),
                    'tempat' => $this->put('tempat')
                ];
                if ($this->komponen->updateInventaris($data, $id) > 0){
                    $this->response([
                        'status' => true,
                        'message' => 'data telah diubah'
                    ], 201);  
                }else{
                    $this->response([
                        'status' => false,
                        'message' => 'gagal mengupdate data'
                    ], 400);  
                    }
            
        }

            public function index_getB5(){
              
                 if($inventaris){
                $this->response($inventaris, 200);
            }
            else
            {
                $this->response([
                    'status' => false,
                    'message' => 'Tidak ada komponen'
                ], 404); 
            }
            }


    }