<div class="container">
    <div class="card">
    <div class="card-header">
        Create Product
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
        <form action="<?php echo base_url('product/store');?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('title'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Category</label>
                    <select class="form-control" name="category_id">
                    <?php 
                        foreach($category as $key=>$cate){  
                    ?>
                        <option value="<?php echo $cate->id?>"><?php echo $cate->title?></option>
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
                        <option value="<?php echo $bra->id?>"><?php echo $bra->title?></option>
                    <?php 
                        }
                    ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" maxlength   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('slug'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" maxlength="255" name="quantity" min="1"  placeholder="Enter quantity">
                <span style="color:red"><?php echo form_error('quantity'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" maxlength="255" name="price" min="1"  placeholder="Enter price">
                <span style="color:red"><?php echo form_error('price'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Price_discount</label>
                <input type="number" class="form-control" maxlength="255" name="price_discount" min="1"  placeholder="Enter price_discount">
                <span style="color:red"><?php echo form_error('price_discount'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description"  placeholder="Enter description">
                <span style="color:red"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <span style="color:red"><?php if(isset($error)){echo $error;} ?></span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-2">Add</button>
                <a href="<?php echo base_url('product/list');?>" class="btn btn-primary mt-2">Cancel</a>
            </div>
        </form>
    </div>
    </div>
</div>
