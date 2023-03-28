
<div class="container">
    <div class="row">
        <div class="header mt-2">
            <h2>Login</h2>
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
        <div class="col-sm-8 mt-4">
            <div class="">
                <form action="<?php echo base_url('login-user');?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email"   placeholder="Enter email">
                        <span style="color:red"><?php echo form_error('email'); ?></span> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                        <span style="color:red"><?php echo form_error('password'); ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
