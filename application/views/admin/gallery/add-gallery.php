<?php
$action = (!empty($gallery))?admin_url('edit-gallery/'.$gallery['id']):admin_url('add-gallery');
$media_type = (!empty($gallery))?$gallery['media_type']:'';
$sequence = (!empty($gallery))?$gallery['sequence']:'';
$filter_type = (!empty($gallery))?$gallery['filter_type']:'';
$media_name = (!empty($gallery))?$gallery['media_name']:'';
$media_video = (!empty($gallery))?$gallery['media_video']:'';
$media_alt = (!empty($gallery))?$gallery['media_alt']:'';
?>
<script src="<?=base_url('assets/js/admin/gallery.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Gallery</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="gallery_management" autocomplete="off">
                            <div class="form-row">
                                <input type="hidden" name="gallery_id" value="">
                                <div class="col-md-6 mb-3">
                                    <label for="">Media Type</label>
                                     <select name="media_type" id="media_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Media Type</option>
                                        <option value="1" <?php if($media_type == 1){echo "selected";}?>>Image</option>
                                        <option value="2" <?php if($media_type == 2){echo "selected";}?>>Video</option>
                                        <option value="3" <?php if($media_type == 3){echo "selected";}?>>YouTube Link</option>
                                     </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Filter Type</label>
                                     <select name="filter_type" class="form-control form-control-sm filter_type">
                                        <option selected="" disabled>Select Filter Type</option>
                                        <?php if($media_type == 1){?>
                                        <option value="1" <?php if($filter_type == 1){echo "selected";}?>>Interior</option>
                                        <option value="2" <?php if($filter_type == 2){echo "selected";}?>>Exterior</option>
                                        <option value="3" <?php if($filter_type == 3){echo "selected";}?>>Construction</option>
                                        <?php } elseif($media_type == 2 || $media_type == 3){?>
                                            <option value="4" <?php if($filter_type == '4'){echo "selected";}?>>Video</option>
                                        <?php } ?>
                                     </select>
                                </div>

                                <div class="col-md-6 mb-3" id="youtube" <?php if($media_type == 3){?>style="display:block" <?php } else {?>style="display:none"<?php } ?>>
                                    <label for="">Add YouTube Link(Enter embeded link for YouTube Video)</label>
                                    <input type="text" name="youtube_link" class="form-control form-control-sm input-sm" placeholder="YouTube Link" value="<?php echo $media_name; ?>">
                                </div>
                                

                                <div class="col-md-6 mb-3" id="image" <?php if($media_type == 1){?>style="display:block" <?php } else {?>style="display:none"<?php } ?>>
                                    <label for="">For best view (250 X 264), JPG | PNG | JPEG</label>
                                    <input type="file" name="image" class="form-control form-control-sm input-sm" onchange="checkFileDetails(748,1102,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                <div class="col-md-6 mb-3" <?php if($media_type == 1){?>style="display:block" <?php } else {?>style="display:none"<?php } ?>>
                                    <?php if (is_file("assets/images/public/home/" . $media_name)) { 
                                        if($media_type == 1) {?>
                                        <img src="<?php echo base_url("assets/images/public/home/" . $media_name); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } }?>
                                </div>


                                <div class="col-md-6 mb-3" id="video"  <?php if($media_type == 2){?>style="display:block" <?php } else {?>style="display:none"<?php } ?>>
                                    <label for="">MP4</label>
                                    <input type="file" name="video" class="form-control form-control-sm input-sm" onchange="checkImageFile(748,1102,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Media Alt Tag</label>
                                    <input type="text" name="comment" class="form-control form-control-sm input-sm" placeholder="comment" value="<?php echo $media_alt; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/home/" . $media_video)) { 
                                        if($media_type == 2) {?>
                                        <video width="320" height="240" controls>
                                        <source src="<?php echo base_url("assets/images/public/home/" . $media_video); ?>" type="video/mp4">
                                        </video>
                                    <?php } }?>
                                </div>
                                
                                

                                <div class="col-md-6 mb-3">
                                    <label for="">Media Preference</label>
                                    <select name="sequence" id="sequence" class="form-control form-control-sm input-sm" >
                                    <option disabled="" selected>Select Preference</option>
                                    <?php for($i=1;$i<=20;$i++){?>
                                    <option value="<?php echo $i; ?>" <?php if($i == $sequence){echo 'selected'; }?>><?php echo $i; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>
                                
                            <button class="btn btn-primary submit-form" type="submit" id="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('gallery');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkImageFile(width,height,file) {
        var fi = file;
        if (fi.files.length > 0) {      // FIRST CHECK IF ANY FILE IS SELECTED.
           
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fileName, fileExtension, fileSize, fileType, dateModified;

                // FILE NAME AND EXTENSION.
                fileName = fi.files.item(i).name;
                fileExtension = fileName.replace(/^.*\./, '');

                // CHECK IF ITS AN IMAGE FILE.
                // TO GET THE IMAGE WIDTH AND HEIGHT, WE'LL USE fileReader().
                if (fileExtension == 'mp4') {
                   // readImageFile(fi.files.item(i),width,height, fi);             // GET IMAGE INFO USING fileReader().
                    $(fi).nextAll('span:first').text('');
                    $('.submit-form').removeAttr('disabled');

                }else{
                     $('.submit-form').prop("disabled", true);
                    $(fi).nextAll('span:first').text('Video format should be (mp4)');
                }
               
            }

            // GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
            function readImageFile(file,width,heigh, fi) {
                var reader = new FileReader(); // CREATE AN NEW INSTANCE.

                reader.onload = function (e) {
                    var img = new Image();      
                    img.src = e.target.result;

                    img.onload = function () {
                        var w = this.width;
                        var h = this.height;

                        if(w>=width && h>=height){
                          $(fi).nextAll('span:first').text('');
                            $('.submit-form').removeAttr('disabled');
                        }else{

                            $('.submit-form').prop("disabled", true);
                             $(fi).nextAll('span:first').text('For Best View Upload Images In '+width+' x '+height);
                        }


                        // document.getElementById('fileInfo').innerHTML =
                        //     document.getElementById('fileInfo').innerHTML + '<br /> ' +
                        //         'Name: <b>' + file.name + '</b> <br />' +
                        //         'File Extension: <b>' + fileExtension + '</b> <br />' +
                        //         'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
                        //         'Width: <b>' + w + '</b> <br />' +
                        //         'Height: <b>' + h + '</b> <br />' +
                        //         'Type: <b>' + file.type + '</b> <br />' +
                        //         'Last Modified: <b>' + file.lastModifiedDate + '</b> <br />';
                    }
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>