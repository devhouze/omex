<?php
$users_id = ($users)?$users->admin_id:'';
$action = (empty($users))?admin_url('add-users'):admin_url('edit-users/'.$users_id);
$user_name = ($users)?$users->user_name:'';
$user_type = ($users)?$users->user_type:'';
$name = ($users)?$users->name:'';
$email = ($users)?$users->email:'';
?>
<script src="<?=base_url('assets/js/admin/users.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>User</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="user_management" autocomplete="off">
                            <div class="form-row">
                                <input type="hidden" name="users_id" value="<?=$users_id;?>">
                                <div class="col-md-12 mb-3">
                                    <label for="">User Type</label>
                                     <select name="user_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select User Type</option>
                                        <option value="0" <?php if($user_type == 0){ echo "selected"; }?>>Admin</option>
                                        <option value="1" <?php if($user_type == 1){ echo "selected"; }?>>Editor</option>
                                        <option value="2" <?php if($user_type == 2){ echo "selected"; }?>>Sales Executive</option>
                                     </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">User Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm username" placeholder="Enter username" name="username" value="<?=$user_name;?>">
                                    <span class="text-danger error"></span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Name" name="name" value="<?=$name;?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm input-sm" placeholder="Email Address" name="email" value="<?=$email;?>">
                                </div>
                               
                                <div class="col-md-12 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm input-sm" placeholder="Password">
                                </div>
                            </div>
                                
                            <button class="btn btn-primary" type="submit" id="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('users');?>')">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>