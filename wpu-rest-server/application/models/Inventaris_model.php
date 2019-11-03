<?php

class Inventaris_model extends CI_Model{

    public function getInventaris($id = null){
        if ($id === null){
        return $this->db->get('komponen')->result_array();  
    }else{
        return $this->db->get_where('komponen', ['id' => $id])->result_array();  

         }
      
    }

    public function deleteInventaris($id){
        $this->db->delete('komponen', ['id' => $id]);
         return $this->db->affected_rows();
    }

    
    public function createInventaris($data){
        $this->db->insert('komponen',$data);
        return $this->db->affected_rows();  
      }

      
    public function updateInventaris($data, $id){
        $this->db->update('komponen', $data, ['id' => $id]);
        return $this->db->affected_rows();  
      }
    
    public function getNamaKomponen($nama = null){
        if ($nama === null){
          return $this->db->get('komponen')->result_array();  
        }else{
          //return $this->db->get_where('mahasiswa', ['nama' => $nama])->result_array();  
          $this->db->like('nama', $nama);
          return $this->db->get('komponen')->result_array();  
  
           }
          }

     public function getTempatKomponen($tempat = null){
        if ($tempat === null){
          return $this->db->get('komponen')->result_array();  
        }else{
          return $this->db->get_where('komponen', ['tempat' => $tempat])->result_array();  
            
      
               }
               
}
}