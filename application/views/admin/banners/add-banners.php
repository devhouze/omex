<?php
$action = (empty($banner))?admin_url('add-banners'):admin_url('edit-banners/'.$banner['id']);
$comment = (!empty($banner))?$banner['comment']:'';
$banner_type = (!empty($banner))?$banner['banner_type']:'';
$banner_link = (!empty($banner))?$banner['banner_link']:'';
?>
<script src="<?=base_url('assets/js/admin/banner.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Banner</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="banner_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="">Banner Type</label>
                                    <select name="banner_type" id="banner_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Option</option>
                                        <option value="1" <?php if($banner_type == '1'){ echo "selected"; }?>>Home Page</option>
                                        <option value="2" <?php if($banner_type == '2'){ echo "selected"; }?>>Event</option>
                                        <option value="3" <?php if($banner_type == '3'){ echo "selected"; }?>>Brand Directory</option>
                                        <!-- <option value="4" <?php if($banner_type == '4'){ echo "selected"; }?>>Brand Discount</option> -->
                                    <!-- <option value="5" <?php if($banner_type == '5'){ echo "selected"; }?>>Brand</option>
                                        <option value="6" <?php if($banner_type == '6'){ echo "selected"; }?>>About Brand</option> -->
                                    </select>
                                </div>


                                <div class="col-md-5 mb-3">
                                    <label for="">For Web<span class="image-type">(For best view upload images in 1366px*553px)</span></label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="banner_web" value="">

                                </div>
                                <div class="col-md-1 mb-3">

                                    <?php  if(is_file("assets/images/public/home/".$banner['banner_web'])){ ?>
                                      <input type="hidden" class="form-control" name="banner_web" value="<?php echo $banner['banner_web'] ?>">  
                                      <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $banner['banner_web']; ?>" class="img-thumb" style="width:100px !important;" />
                                  <?php } ?>
                              </div>

                              <div class="col-md-6 mb-3">
                                <label for="">Banner Alt Tag</label>
                                <input type="text" class="form-control form-control-sm input-sm" name="banner_comment" value="<?php echo $comment;?>">
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="">For Mobile<span class="image-type">(For best view upload images in 748px*1102px)</span></label>
                                <input type="file" class="form-control form-control-sm input-sm" name="banner_mobile" value="">
                                
                            </div>
                            <div class="col-md-1 mb-3">
                                <?php  if(is_file("assets/images/public/home/".$banner['banner_mobile'])){ ?>
                                  <input type="hidden" class="form-control" name="banner_mobile" value="<?php echo $banner['banner_mobile'] ?>">  
                                  <img src="<?php echo base_url(); ?>assets/images/public/home/<?php echo $banner['banner_mobile']; ?>" class="img-thumb" style="width:100px !important;" />
                              <?php } ?>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="">Banner Link</label>
                            <input type="text" class="form-control form-control-sm input-sm" name="banner_link" value="<?php echo $banner_link; ?>">
                        </div>

                        <div class="col-md-6 mb-3" id="streets" style="display:none">
                            <label for="">Street</label>
                            <select name="streets" class="form-control form-control-sm">
                                <option selected="" disabled>Select Street</option>
                                <option value="London Street">London Street</option>
                                <option value="Paris Street">Paris Street</option>
                                <option value="Hong Kong Street">Hong Kong Street</option>
                                <option value="Amsterdam Street">Amsterdam Street</option>
                                <option value="Portugal Street">Portugal Street</option>
                                <option value="San Francisco Street">San Francisco Street</option>
                                <option value="Athens Street">Athens Street</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" id="brands" style="display:none">
                            <label for="">Brand</label>
                            <select name="brand" class="form-control form-control-sm">
                                <option disabled selected>Select Brand</option>
                                <?php if(!empty($brands)) { foreach($brands as $brand){?>
                                    <option value="<?=$brand['brand_id']?>"><?=$brand['brand_name']?></option>
                                <?php } }?>
                            </select>
                        </div>

                    </div>

                    <button class="btn btn-primary submit-form" type="submit">Save</button>
                    <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('banners');?>')">Go Back</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $( document ).ready(function(){
        $('#banner_type').change(function(){
            var option = $('#banner_type').val();
            if(option == 2){
                $('#streets').css('display','block');
                $('#brands').css('display','none');
            } else if(option == 3) {
                $('#streets').css('display','block');
                $('#brands').css('display','block');
            }
        // else if(option == 4) {
        //     $('#streets').css('display','none');
        //     $('#brands').css('display','block');
        // } else if(option == 5) {
        //     $('#streets').css('display','block');
        //     $('#brands').css('display','block');
        // } else if(option == 6) {
        //     $('#streets').css('display','block');
        //     $('#brands').css('display','block');
        // }
        else{
            $('#streets').css('display','none');
            $('#brands').css('display','none');
        }

        
    });
    });


</script>