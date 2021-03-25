<?php
// print_r($whats_new); die;
$action = (empty($whats_new))?admin_url('add-whats-new'):admin_url('edit-whats-new/'.$whats_new['id']);
$name = (empty($whats_new))?'':$whats_new['name'];
$about  = (empty($whats_new))?'':$whats_new['about'];
$alt_tag  = (empty($whats_new))?'':$whats_new['alt_tag'];
$banner_web  = (empty($whats_new))?'':$whats_new['thumb_web'];
$banner_mob  = (empty($whats_new))?'':$whats_new['thumb_mob'];
$show_reg_btn  = (empty($whats_new))?'':$whats_new['show_reg_btn'];
?>

<script src="<?=base_url('assets/js/admin/whats_new.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>What's New</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="whats_new_management" autocomplete="off">
                            <div class="form-row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Name" name="name" value="<?php echo $name;?>">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Banner Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Alt Tag" name="alt_tag" value="<?php echo $alt_tag; ?>">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Banner Web<span class="image-type">(For best view upload images in 1366px * 553px)</span></label>
                                    <input type="file" class="form-control form-control-sm input-sm" placeholder="Banner Web" name="banner_web" value=""onchange="checkFileDetails(1366,553,this)">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Banner Mobile<span class="image-type">(For best view upload images in 748px*1102px)</span></label>
                                    <input type="file" class="form-control form-control-sm input-sm" placeholder="Banner Mobile" name="banner_mobile" value=""onchange="checkFileDetails(748,1102,this)">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                <?php  if(is_file("assets/images/public/home/".$banner_web)){ ?>
                                  <input type="hidden" class="form-control" name="banner_mobile" value="<?php echo $banner_web ?>">  
                                  <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $banner_web ?>" class="img-thumb" style="width:100px !important;" />
                                <?php } ?>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                <?php  if(is_file("assets/images/public/home/".$banner_mob)){ ?>
                                  <input type="hidden" class="form-control" name="banner_mobile" value="<?php echo $banner_mob ?>">  
                                  <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $banner_mob; ?>" class="img-thumb" style="width:100px !important;" />
                                <?php } ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Activate Register Button</label>
                                    <select name="show_reg_btn" class="form-control form-control-sm select-box">
                                    <option value="Yes" <?php if($show_reg_btn == "Yes"){ echo "selected"; }?>>Yes</option>
                                    <option value="No" <?php if($show_reg_btn == "No"){ echo "selected"; }?>>No</option>
                                    </select>
                                </div>


                                
                                <div class="col-md-12 mb-3">
                                    <label for="">About</label>
                                    <textarea name="about" class="form-control form-control-sm ckeditor"><?php echo $about; ?></textarea>
                                </div>
                            </div>
                                
                            <button class="btn btn-primary submit-form" type="submit" id="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('whats-new');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>