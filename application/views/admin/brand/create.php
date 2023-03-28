<div class="container">
    <div class="card">
    <div class="card-header">
        Create Brand
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
        <form action="<?php echo base_url('brand/store');?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('title'); ?></span> 
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug"   placeholder="Enter title">
                <span style="color:red"><?php echo form_error('slug'); ?></span> 
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
            <button type="submit" class="btn btn-primary mt-2">Add</button>
        </form>
    </div>
    </div>
</div>
