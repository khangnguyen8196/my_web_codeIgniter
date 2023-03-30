<div class="container">
    <div class="card">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
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
        <form action="<?php echo base_url('product/update/'.$product->id);?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $product->title;?>"  placeholder="Enter title">
                <span style="color:red"><?php echo form_error('title'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Category</label>
                    <select class="form-control" name="category_id">
                    <?php 
                        foreach($category as $key=>$cate){  
                    ?>
                        <option <?php $cate->id ==$product->category_id ? 'selected':''?>  value="<?php echo $cate->id?>"><?php echo $cate->title?></option>
                    <?php 
                        }
                    ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="">Brand</label>
                    <select class="form-control" name="brand_id">
                    <?php 
                        foreach($brand as $key=>$bra){  
                    ?>
                        <option <?php $bra->id ==$product->brand_id ? 'selected':''?> value="<?php echo $bra->id?>"><?php echo $bra->title?></option>
                    <?php 
                        }
                    ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" maxlength="255" value="<?php echo $product->quantity;?>"  name="quantity" min="1"  placeholder="Enter quantity">
                <span style="color:red"><?php echo form_error('quantity'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" maxlength="255" value="<?php echo $product->price;?>"  name="price" min="1"  placeholder="Enter quantity">
                <span style="color:red"><?php echo form_error('price'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Price_discount</label>
                <input type="number" class="form-control" maxlength="255" value="<?php echo $product->price_discount;?>"  name="price_discount" min="1"  placeholder="Enter quantity">
                <span style="color:red"><?php echo form_error('price_discount'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="<?php echo $product->slug;?>"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('slug'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $product->description;?>"  placeholder="Enter description">
                <span style="color:red"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <?php if($product->image != ''): ?>
                    <img src="<?php echo base_url('uploads/product/'.$product->image)?>" width="150" height="150" alt="image">
                    <br>
                    <label><input type="checkbox" name="delete_image"> Xoá ảnh cũ</label>
                    <input type="hidden" name="old_image" value="<?php echo $product->image; ?>">
                <?php endif; ?>
                <span style="color:red"><?php if(isset($error)){echo $error;} ?></span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                    <select class="form-control" name="status">
                       <?php 
                            if($product->status==1){
                        ?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>        
                        <?php 
                            }else{
                        ?>
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        <?php
                            }
                       ?>
                    </select>
            </div>
            <div>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="<?php echo base_url('product/list');?>" class="btn btn-primary mt-2">Cancel</a>
            </div>
        </form>
    </div>
    </div>
</div>
