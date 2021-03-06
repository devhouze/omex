<?php
$action = (empty($logos))?admin_url('add-brands-logo'):admin_url('edit-brands-logo/'.$logos['id']);
$name = (!empty($logos))?$logos['name']:'';
$alt_coment = (!empty($logos))?$logos['alt_coment']:'';
?>
<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Brand Logo</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="brand_logo_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="name" value="<?=$name;?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">File</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="brand_logo" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="comment" value="<?=$alt_coment;?>">
                                </div>

                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('banners');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
