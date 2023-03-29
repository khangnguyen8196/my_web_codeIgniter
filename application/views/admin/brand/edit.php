<div class="container">
    <div class="card">
    <div class="card-header">
        Edit Brand
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
        <form action="<?php echo base_url('brand/update/'.$brand->id);?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $brand->title;?>"  placeholder="Enter title">
                <span style="color:red"><?php echo form_error('title'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="<?php echo $brand->slug;?>"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('slug'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $brand->description;?>"  placeholder="Enter description">
                <span style="color:red"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <img src="<?php echo base_url('uploads/brand/'.$brand->image)?>" width="150" height="150" alt="image">
                <span style="color:red"><?php if(isset($error)){echo $error;} ?></span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                    <select class="form-control" name="status">
                       <?php 
                            if($brand->status==1){
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
            <a href="<?php echo base_url('brand/list');?>" class="btn btn-primary mt-2">Cancel</a>
            </div>
        </form>
    </div>
    </div>
</div>
