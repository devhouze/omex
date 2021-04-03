<?php
// print_r($whats_new); die;
$action = (empty($whats_new_gallery))?admin_url('add-whats-new-gallery'):admin_url('edit-whats-new-gallery/'.$whats_new_gallery['id']);
$whats_new_slug  = (empty($whats_new_gallery))?'':$whats_new_gallery['whats_new_slug'];
$image_alt  = (empty($whats_new_gallery))?'':$whats_new_gallery['image_alt'];
$image_web  = (empty($whats_new_gallery))?'':$whats_new_gallery['image_web'];
$image_mob  = (empty($whats_new_gallery))?'':$whats_new_gallery['image_mob'];

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
                        <form action="<?=$action;?>" method="post" id="whats_new_gallery_management" autocomplete="off">
                            <div class="form-row">
                                <?php //print_r($whats_new); die;?>
                                <div class="col-md-6 mb-3">
                                    <label for="">Select What's New</label>
                                    <select name="whats_new" class="form-control form-control-sm select-box">
                                    <option value="">Choose one</option>
                                    <?php if(!empty($whats_new)){ foreach($whats_new as $wn){?>
                                        <option value="<?php echo $wn['name_slug'];?>" <?php echo trim($wn['name_slug'])===trim($whats_new_slug)?'selected':'' ?>><?php echo $wn['name'];?></option>
                                    <?php } }?>
                                    </select>
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Gallery Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter Alt Tag" name="alt_tag" value="<?php echo $image_alt; ?>">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Gallery Web<span class="image-type">(For best view upload images in 1366px * 553px)</span></label>
                                    <input type="file" class="form-control form-control-sm input-sm" placeholder="Gallery Web" name="image_web" value=""onchange="checkFileDetails(1366,553,this)">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Gallery Mobile<span class="image-type">(For best view upload images in 748px*1102px)</span></label>
                                    <input type="file" class="form-control form-control-sm input-sm" placeholder="Gallery Mobile" name="image_mob" value=""onchange="checkFileDetails(748,1102,this)">
                                    <span class="text-danger error"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                <?php  if(is_file("assets/images/public/home/".$image_web)){ ?>
                                  <input type="hidden" class="form-control" name="Gallery_mobile" value="<?php echo $image_web ?>">  
                                  <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $image_web ?>" class="img-thumb" style="width:100px !important;" />
                                <?php } ?>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                <?php  if(is_file("assets/images/public/home/".$image_mob)){ ?>
                                  <input type="hidden" class="form-control" name="Image Mobile" value="<?php echo $image_mob ?>">  
                                  <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $image_mob; ?>" class="img-thumb" style="width:100px !important;" />
                                <?php } ?>
                                </div>
                                
                            </div>
                                
                            <button class="btn btn-primary submit-form" type="submit" id="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('whats-new-gallery');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>