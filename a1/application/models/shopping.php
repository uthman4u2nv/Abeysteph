<?php 

Class Shopping extends CI_Model {

    //returns all categories   
    public function categories(){
        $query=$this->db->query("SELECT * FROM oc_category_description WHERE name NOT LIKE '%test%'");
        return $query->result_array();
//$this->db->where('name !=','test');
        //return $this->db->get('oc_category_description')->result_array();
    }
   
}
?>
