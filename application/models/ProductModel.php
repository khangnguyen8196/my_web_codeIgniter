<?php
class ProductModel extends CI_Model
{
    public function insertProduct($data)
    {
        return $this->db->insert('products',$data);
    }
    public function selectAllProduct()
    {
    $query = $this->db->select('categories.title as cate_title, products.*, brands.title as bra_title')
        ->from('products')
        ->join('categories', 'products.category_id = categories.id')
        ->join('brands', 'brands.id = products.brand_id')
        ->get();
    return $query->result();
    }


    public function selectProductById($id)
    {
        $query = $this->db->get_where('products',['id'=>$id]);
        return $query->row();
    }

    public function updateProduct($id,$data)
    {
        return $this->db->update('products',$data,['id'=>$id]);
    }

    // public function deleteProduct($id)
    // {
    //     return $this->db->delete('products',['id'=>$id]);
    // }

    public function deleteProduct($id)
    {
    $product = $this->db->where('id',$id)->get('products')->row();
    if(!empty($product)){
        $image_path = './uploads/product/'.$product->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }
    $this->db->where('id',$id);
    $this->db->delete('products');
    }

}
?>