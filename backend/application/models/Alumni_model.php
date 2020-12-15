<?php

class Alumni_model extends CI_Model
{
    public function getAlumni($id = null)
    {
        if ($id === null){
            return $this->db->get('alumni')->result_array();
        } else {
            return $this->db->get_where('alumni', ['id' => $id])->result_array();
        }
    
    }

    public function deleteAlumni($id)
    {
        $this->db->delete('alumni', ['id' => $id]);
        return $this->db->affected_rows();
    }
	
	 public function insertAlumni($data){
            $this->db->insert('alumni',$data);
            return $this->db->affected_rows();            
        }

        public function updateAlumni($data,$id){
            $this->db->update('alumni',$data,['id' => $id]);
            return $this->db->affected_rows();            
        }

}