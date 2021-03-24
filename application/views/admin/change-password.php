
<script src="<?=base_url('assets/js/admin/profile.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Change Password</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=admin_url('change-password');?>" method="post" id="change_password" autocomplete="off">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control form-control-sm input-sm" placeholder="Enter new password" name="password">
                                </div>
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