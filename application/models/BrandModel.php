<?php
class BrandModel extends CI_Model
{
    public function insertBrand($data)
    {
        return $this->db->insert('brands',$data);
    }
    public function selectBrand()
    {
        $query = $this->db->get('brands');
        return $query->result();
    }

    public function selectBrandById($id)
    {
        $query = $this->db->get_where('brands',['id'=>$id]);
        return $query->row();
    }

    public function updateBrand($id,$data)
    {
        return $this->db->update('brands',$data,['id'=>$id]);
    }

    // public function deleteBrand($id)
    // {
    //     return $this->db->delete('brands',['id'=>$id]);
    // }

    public function deleteBrand($id)
    {
    $brand = $this->db->where('id',$id)->get('brands')->row();
    if(!empty($brand)){
        $image_path = './uploads/brand/'.$brand->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
    $this->db->where('id',$id);
    $this->db->delete('brands');
    }

}
?>