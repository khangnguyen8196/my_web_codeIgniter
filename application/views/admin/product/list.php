<div class="container">
    <div class="card">
    <div class="card-header">
        List Product
        <?php 
            if($this->session->flashdata('success')){
        ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success')?></div>
        <?php            
            }elseif($this->session->flashdata('error')){
        ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error')?></div>
        <?php        
            }
        ?>
    </div>
    <div class="card-body">
        <a href="<?php echo base_url('product/create');?>" class="btn btn-primary mb-2 float-right">Add Product</a>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Price_discount</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ( $product as $key=>$pro){
                ?>
                    <tr>
                    <th scope="row"><?php echo $key+1 ?></th>
                    <td><?php echo $pro->title;?></td>
                    <td><?php echo $pro->description;?></td>
                    <td><?php echo $pro->cate_title;?></td>
                    <td><?php echo $pro->bra_title;?></td>
                    <td><?php echo $pro->quantity;?></td>
                    <td><?php echo number_format($pro->price,0,',','.');?> vnd</td>
                    <td><?php echo number_format($pro->price_discount,0,',','.');?> vnd</td>
                    <td>
                        <img src="<?php echo base_url('uploads/product/'.$pro->image)?>" width="150" height="150" alt="image">
                    </td>
                    <td>
                        <?php if($pro->status==1){
                            echo 'Active';
                        }else{
                            echo 'Inactive';
                        } ?>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure')" href="<?php echo base_url('product/delete/'.$pro->id) ?>" class="btn btn-danger">Delete</a>
                        <a href="<?php echo base_url('product/edit/'.$pro->id) ?>" class="btn btn-warning">edit</a>
                    </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>