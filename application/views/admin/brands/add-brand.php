<?php
$brand_id = ($brands)?$brands->brand_id:'';
$action = (empty($brands))?admin_url('add-brands'):admin_url('edit-brands/'.$brand_id);
$brand_name = (!empty($brands))?$brands->brand_name:'';
$logo_message = (!empty($brands))?$brands->logo_message:'';
$brand_website = (!empty($brands))?$brands->brand_website:'';
$about_brand = (!empty($brands))?$brands->about_brand:'';
$brand_label = (!empty($brands))?$brands->brand_label:'';
$from_hour_week = (!empty($brands))?$brands->from_hour_week:'';
$to_week_hour = (!empty($brands))?$brands->to_week_hour:'';
$to_weekend_hour = (!empty($brands))?$brands->to_weekend_hour:'';
$from_hour_weekend = (!empty($brands))?$brands->from_hour_weekend:'';
$brand_location = (!empty($brands))?$brands->brand_location:'';
$brand_type = (!empty($brands))?$brands->brand_type:'';
$brand_contact = (!empty($brands))?$brands->brand_contact:'';
$brand_contact_email = (!empty($brands))?$brands->brand_contact_email:'';
$brand_sub_category = (!empty($brands))?$brands->brand_sub_category:'';
$store_map = (!empty($brands))?$brands->store_map:'';
$brand_street = (!empty($brands))?$brands->brand_street:'';
$brand_category = (!empty($brands))?explode(",",$brands->brand_category):[];
$brand_audience = (!empty($brands))?$brands->brand_audience:'';
$show_on_home = (!empty($brands))?$brands->show_on_home:'';
$brand_audience = (!empty($brands))?$brands->brand_audience:'';
$brand_offer_status = (!empty($brands))?$brands->brand_offer_status:'';
$brand_offer_name = (!empty($brands))?$brands->brand_offer_name:'';
$brand_offer_thumbnail_message = (!empty($brands))?$brands->brand_offer_thumbnail_message:'';
$brand_offer_validity = (!empty($brands))?$brands->brand_offer_validity:'';
$brand_offer = (!empty($brands))?$brands->brand_offer:'';
$about_brand_offer = (!empty($brands))?$brands->about_brand_offer:'';

?>

<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Brand</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="brand_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="brand_id" value="<?=$brand_id;?>">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter brand name" name="brand_name" value="<?=$brand_name;?>">
                                    <span class="text-danger brand_name errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Logo</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="brand_logo">
                                    <span class="text-danger brand_logo errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Logo Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="logo_comment" value="<?=$logo_message;?>">
                                    <span class="text-danger logo_comment errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Website</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_website" value="<?=$brand_website;?>">
                                    <span class="text-danger brand_website errors_msg"></span>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Brand</label>
                                    <textarea name="about_brand" class="form-control form-control-sm"><?=$about_brand;?></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Label</label>
                                    <select name="brand_label" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Label</option>
                                        <option value="New In" <?php if($brand_label == "New In"){ echo 'selected'; }?>>New In</option>
                                        <option value="Sale & Offers" <?php if($brand_label == "Sale & Offers"){ echo 'selected';}?>>Sale & Offers</option>
                                        <option value="Popular" <?php if($brand_label == "Popular"){'selected';}?>>Popular</option>
                                        <option value="Exclusive WS" <?php if($brand_label == "Exclusive WS"){'selected';}?>>Exclusive WS</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">From Operation Hour(Week)</label>
                                    <input type="text" class="form-control form-control-sm input-sm from_week_hour" name="from_week_hour" value="<?=$from_hour_week;?>">
                                    <span class="text-danger from_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">To Operation Hour(Week)</label>
                                    <input type="text" class="form-control form-control-sm input-sm to_week_hour" name="to_week_hour" value="<?=$to_week_hour;?>">
                                    <span class="text-danger to_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">From Operation Hour(Weekend)</label>
                                    <input type="text" class="form-control form-control-sm input-sm from_weekend_hour" name="from_weekend_hour" value="<?=$from_hour_weekend;?>">
                                    <span class="text-danger from_weekend_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">To Operation Hour(Weekend)</label>
                                    <input type="text" class="form-control form-control-sm input-sm to_weekend_hour" name="to_weekend_hour" value="<?=$to_weekend_hour;?>">
                                    <span class="text-danger to_weekend_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_location" value="<?=$brand_location;?>">
                                    <span class="text-danger brand_location errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Type</label><br>
                                    <select name="brand_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Type</option>
                                        <option value="Shop" <?php if($brand_type == "Shop"){echo "selected";}?>>Shop</option>
                                        <option value="Eat" <?php if($brand_type == "Eat"){echo "selected";}?>>Eat</option>
                                        <option value="Entertainment" <?php if($brand_type == "Entertainment"){echo "selected";}?>>Entertainment</option>
                                        <option value="Other" <?php if($brand_type == "Other"){echo "selected";}?>>Other </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_contact" value="<?=$brand_contact;?>">
                                    <span class="text-danger brand_contact errors_msg"></span>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Sub Category</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="sub_category" value="<?=$brand_sub_category;?>">
                                    <span class="text-danger sub_category errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="email_contact" value="<?=$brand_contact_email;?>">
                                    <span class="text-danger email_contact errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Store Map</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="store_map" value="<?=$store_map;?>">
                                    <span class="text-danger store_map errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Street</label>
                                    <select name="brand_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Street</option>
                                        <option value="London Street" <?php if($brand_street == "London Street"){echo "selected"; }?>>London Street</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Brand Category</label><br>
                                    <input type="checkbox" name="brand_category[]" value="Jewellery" <?php if(in_array("Jewellery",$brand_category)){echo "checked";}?>> Jewellery
                                    <input type="checkbox" name="brand_category[]" value="Restaurant"<?php if(in_array("Restaurant",$brand_category)){echo "checked";}?>> Restaurant
                                    <input type="checkbox" name="brand_category[]" value="Clothing"<?php if(in_array("Clothing",$brand_category)){echo "checked";}?>> Clothing
                                    <input type="checkbox" name="brand_category[]" value="Fitness"<?php if(in_array("Fitness",$brand_category)){echo "checked";}?>> Fitness
                                    <input type="checkbox" name="brand_category[]" value="Toys"<?php if(in_array("Toys",$brand_category)){echo "checked";}?>> Toys
                                    <input type="checkbox" name="brand_category[]" value="Shoes"<?php if(in_array("Shoes",$brand_category)){echo "checked";}?>> Shoes
                                    <input type="checkbox" name="brand_category[]" value="Sports & Fitness"<?php if(in_array("Sports & Fitness",$brand_category)){echo "checked";}?>> Sports & Fitness
                                    <br>
                                    <span class="text-danger brand_category errors_msg"></span>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Audience</label><br>
                                    <input type="radio" name="brand_audience" value="Infants" <?php if($brand_audience == "Infants"){ echo "checked"; }?>> Infants
                                    <input type="radio" name="brand_audience" value="Kids" <?php if($brand_audience == "Kids"){ echo "checked"; }?>> Kids
                                    <input type="radio" name="brand_audience" value="Boys" <?php if($brand_audience == "Boys"){ echo "checked"; }?>> Boys
                                    <input type="radio" name="brand_audience" value="Girls" <?php if($brand_audience == "Girls"){ echo "checked"; }?>> Girls
                                    <input type="radio" name="brand_audience" value="Men" <?php if($brand_audience == "Men"){ echo "checked"; }?>> Men
                                    <input type="radio" name="brand_audience" value="Women" <?php if($brand_audience == "Women"){ echo "checked"; }?>> Women
                                    <input type="radio" name="brand_audience" value="Elderly" <?php if($brand_audience == "Elderly"){ echo "checked"; }?>> Elderly
                                    <br>
                                    <span class="text-danger brand_audience errors_msg"></span>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Feature On Home Page</label><br>
                                    <input type="radio" name="show_on_home" value="Yes" <?php if($show_on_home == "Yes"){echo "checked"; }?>> Yes
                                    <input type="radio" name="show_on_home" value="No" <?php if($show_on_home == "No"){echo "checked"; }?>> No
                                    <br>
                                    <span class="text-danger show_on_home errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Activate Brand Offer</label><br>
                                    <input type="radio" name="show_brand_offer" value="Yes" class="show_brand_offers" <?php if($brand_offer_status == "Yes"){echo "checked"; }?>> Yes
                                    <input type="radio" name="show_brand_offer" value="No" class="show_brand_offers" <?php if($brand_offer_status == "No"){echo "checked"; }?>> No
                                    <br>
                                    <span class="text-danger show_brand_offer errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">Brand Offer Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_offer_name" value="<?=$brand_offer_name;?>">
                                    <span class="text-danger brand_offer_name errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">Brand Label Custom Offer</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_custom_offer" value="<?=$brand_offer;?>">
                                    <span class="text-danger brand_custom_offer errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">Brand Offer Validity</label>
                                    <input type="text" class="form-control form-control-sm input-sm datepicker" name="offer_validity" value="<?=$brand_offer_validity;?>">
                                    <span class="text-danger offer_validity errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">Brand Offer Thumbnail</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="offer_thumbnail" value="">
                                    <span class="text-danger offer_thumbnail errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">Brand Offer Thumbnail Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_message" value="<?=$brand_offer_thumbnail_message;?>">
                                    <span class="text-danger thumbnail_message errors_msg"></span>
                                </div>

                                <div class="col-md-12 mb-3 brand_offer" <?php if($brand_offer_status == "Yes"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
                                    <label for="">About Brand Offer</label>
                                    <textarea name="about_brand_offer" class="form-control form-control-sm"><?=$about_brand_offer;?></textarea>
                                </div>

                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('brands');?>')">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function(){
    $(".from_week_hour").timepicker();
    $(".from_weekend_hour").timepicker();

});
$( document ).ready(function(){
    <?php if(empty($brand_id)){?>
    $('.from_week_hour').change(function(){
        var from_time = $('.from_week_hour').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".to_week_hour").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    });
    <?php } else { ?>
    var from_time = $('.from_week_hour').val();
    var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
    $(".to_week_hour").timepicker({
        minTime: min_time,
        timeStep: 5
    });
    <?php } ?>
});
$( document ).ready(function(){
    <?php if(empty($brand_id)){?>
    $('.from_weekend_hour').change(function(){
        var from_time = $('.from_weekend_hour').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".to_weekend_hour").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    });
    <?php } else { ?>
    var from_time = $('.from_weekend_hour').val();
    var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
    $(".to_weekend_hour").timepicker({
        minTime: min_time,
        timeStep: 5
    });
    <?php } ?>
});


      
</script>