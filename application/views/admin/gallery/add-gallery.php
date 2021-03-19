<?php
$action = (!empty($gallery))?admin_url():admin_url('add-gallery');
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
                                <div class="col-md-12 mb-3">
                                    <label for="">Media Type</label>
                                     <select name="media_type" id="media_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Media Type</option>
                                        <option value="1">Image</option>
                                        <option value="2">Video</option>
                                        <option value="3">YouTube Link</option>
                                     </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Filter Type</label>
                                     <select name="filter_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Filter Type</option>
                                        <option value="1">Interior</option>
                                        <option value="2">Exterior</option>
                                        <option value="3">Construction</option>
                                     </select>
                                </div>

                                <div class="col-md-12 mb-3" id="youtube" style="display:none">
                                    <label for="">YouTube Link</label>
                                    <input type="text" name="youtube_link" class="form-control form-control-sm input-sm" placeholder="comment">
                                </div>

                                <div class="col-md-12 mb-3" id="media" style="display:none">
                                    <label for="">Media File (Must be add the images in equal size)</label>
                                    <input type="file" name="gallery" class="form-control form-control-sm input-sm">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="">Media Alt Tag</label>
                                    <input type="text" name="comment" class="form-control form-control-sm input-sm" placeholder="comment">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Media Preference</label>
                                    <select name="sequence" class="form-control form-control-sm input-sm" >
                                    <option disabled="" selected>Select Preference</option>
                                    <?php for($i=1;$i<10;$i++){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>
                                
                            <button class="btn btn-primary" type="submit" id="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('gallery');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>