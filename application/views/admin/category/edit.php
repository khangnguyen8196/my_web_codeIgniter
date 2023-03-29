<div class="container">
    <div class="card">
    <div class="card-header">
        Edit Category
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
        <form action="<?php echo base_url('category/update/'.$category->id);?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $category->title;?>"  placeholder="Enter title">
                <span style="color:red"><?php echo form_error('title'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="<?php echo $category->slug;?>"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('slug'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $category->description;?>"  placeholder="Enter description">
                <span style="color:red"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <?php if($category->image != ''): ?>
                    <img src="<?php echo base_url('uploads/category/'.$category->image)?>" width="150" height="150" alt="image">
                    <br>
                    <label><input type="checkbox" name="delete_image"> Xoá ảnh cũ</label>
                    <input type="hidden" name="old_image" value="<?php echo $category->image; ?>">
                <?php endif; ?>
                <span style="color:red"><?php if(isset($error)){echo $error;} ?></span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                    <select class="form-control" name="status">
                       <?php 
                            if($category->status==1){
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
            <a href="<?php echo base_url('category/list');?>" class="btn btn-primary mt-2">Cancel</a>
            </div>
        </form>
    </div>
    </div>
</div>
