
<?php
$action = (empty($brand_offers))?admin_url('add-brands-offer'):admin_url('edit-brands-offer/'.$brand_offers->offer_id);
$brand_id = (!empty($brand_offers))?$brand_offers->brand_id:'';
$brand_offer_name = (!empty($brand_offers))?$brand_offers->offer_name:'';
$brand_offer_thumbnail_message = (!empty($brand_offers))?$brand_offers->thumbnail_alt:'';
$about_brand_offer = (!empty($brand_offers))?$brand_offers->about_offer:'';
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
                        <form action="<?=$action;?>" method="post" id="brand_offer_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand_id" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Brand</option>
                                        <?php if(!empty($brands)){ foreach($brands as $brand){?>
                                        <option value="<?=$brand['brand_id'];?>" <?php if($brand_id == $brand['brand_id']){echo "selected";}?>><?=$brand['brand_name'];?></option>
                                        <?php } }?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Offer Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_offer_name" value="<?=$brand_offer_name;?>">
                                </div>

                                <div class="col-md-6 mb-3" style="display:none;">
                                    <label for="">Brand Label Custom Offer</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_custom_offer" value="">
                                </div>

                                <div class="col-md-6 mb-3"style="display:none;">
                                    <label for="">Brand Offer Validity</label>
                                    <input type="text" class="form-control form-control-sm input-sm datepicker" name="offer_validity" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Offer Thumbnail</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="offer_thumbnail" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Offer Thumbnail Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_alt" value="<?=$brand_offer_thumbnail_message;?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Brand Offer</label>
                                    <textarea name="about_brand_offer" class="form-control form-control-sm ckeditor"><?=$about_brand_offer;?></textarea>
                                </div>

                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('brand-offer');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

