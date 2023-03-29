<?php
class CategoryModel extends CI_Model
{
    public function insertCategory($data)
    {
        return $this->db->insert('categories',$data);
    }
    public function selectCategory()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function selectCategoryById($id)
    {
        $query = $this->db->get_where('categories',['id'=>$id]);
        return $query->row();
    }

    public function updateCategory($id,$data)
    {
        return $this->db->update('categories',$data,['id'=>$id]);
    }

    // public function deleteCategory($id)
    // {
    //     return $this->db->delete('categories',['id'=>$id]);
    // }
    public function deleteCategory($id)
    {
    $category = $this->db->where('id',$id)->get('categories')->row();
    if(!empty($category)){
        $image_path = './uploads/category/'.$category->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
    $this->db->where('id',$id);
    $this->db->delete('categories');
    }
}
?>