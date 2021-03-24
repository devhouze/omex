<?php
$action = admin_url('update-profile');
$name = ($admin_profile)?$admin_profile->name:'';
$email = ($admin_profile)?$admin_profile->email:'';
?>
<script src="<?=base_url('assets/js/admin/profile.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Leads</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="admin_profile" autocomplete="off">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Name" name="name" value="<?=$name;?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm input-sm" placeholder="Email Address" name="email" value="<?=$email;?>">
                                </div>
                                <!-- <div class="col-md-12 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm input-sm" placeholder="Password">
                                </div> -->
                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.history.back()">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>