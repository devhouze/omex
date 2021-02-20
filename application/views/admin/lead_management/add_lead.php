<?php
$action = (empty($lead))?admin_url('save-leads'):admin_url('update-leads');
$lead_id = ($lead)?$lead->id:'';
$lead_name = ($lead)?$lead->name:'';
$lead_email = ($lead)?$lead->email:'';
$lead_contact = ($lead)?$lead->contact:'';
?>
<script src="<?=base_url('assets/js/admin/lead_management.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Leads</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="lead_management" autocomplete="off">
                            <div class="form-row">
                                <input type="hidden" name="lead_id" value="<?=$lead_id;?>">
                                <div class="col-md-12 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Name" name="name" value="<?=$lead_name;?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm input-sm" placeholder="Email Address" name="email" value="<?=$lead_email;?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Contact Number" name="contact" value="<?=$lead_contact;?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm input-sm" placeholder="Password">
                                </div>
                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('leads');?>')">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>