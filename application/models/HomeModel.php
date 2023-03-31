<?php
    class HomeModel extends CI_Model
    {
        public function getCategoryHome()
        {
            $query = $this->db->get_where('categories',['status' =>1]);
            return $query->result();
        }
        public function getBrandHome()
        {
            $query = $this->db->get_where('brands',['status' =>1]);
            return $query->result();
        }
        public function getAllProduct()
        {
            $query = $this->db->get_where('products',['status' =>1]);
            return $query->result();
        }
    }
?>