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
                                    <label for="">Logo Alt Tag</label>
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
                                    <textarea name="about_brand" class="form-control form-control-sm ckeditor"><?=$about_brand;?></textarea>
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
                                    <label for="">Weekday Operational Start Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm week_hour_start" name="from_week_hour" value="<?=$from_hour_week;?>">
                                    <span class="text-danger from_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Weekday Operational End Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm week_end_time" name="to_week_hour" value="<?=$to_week_hour;?>">
                                    <span class="text-danger to_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Weekend Operational Start Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm weekend_hour_start" name="from_weekend_hour" value="<?=$from_hour_weekend;?>">
                                    <span class="text-danger from_weekend_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Weekend Operational End Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm weekend_end_hour" name="to_weekend_hour" value="<?=$to_weekend_hour;?>">
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
                                    <label for="">Brand Contact Number</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_contact" value="<?=$brand_contact;?>">
                                    <span class="text-danger brand_contact errors_msg"></span>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Sub Category</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="sub_category" value="<?=$brand_sub_category;?>">
                                    <span class="text-danger sub_category errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Email Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="email_contact" value="<?=$brand_contact_email;?>">
                                    <span class="text-danger email_contact errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Store Map URL</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="store_map" value="<?=$store_map;?>">
                                    <span class="text-danger store_map errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Street</label>
                                    <select name="event_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Street</option>
                                        <option value="London Street" <?php if($brand_street == "London Street"){echo "selected"; }?>>London Street</option>
                                        <option value="Paris Street" <?php if($brand_street == "Paris Street"){echo "selected"; }?>>Paris Street</option>
                                        <option value="Hong Kong Street" <?php if($brand_street == "Hong Kong Street"){echo "selected"; }?>>Hong Kong Street</option>
                                        <option value="Amsterdam Street" <?php if($brand_street == "Amsterdam Street"){echo "selected"; }?>>Amsterdam Street</option>
                                        <option value="Portugal Street" <?php if($brand_street == "Portugal Street"){echo "selected"; }?>>Portugal Street</option>
                                        <option value="San Francisco Street" <?php if($brand_street == "San Francisco Street"){echo "selected"; }?>>San Francisco Street</option>
                                        <option value="Athens Street" <?php if($brand_street == "Athens Street"){echo "selected"; }?>>Athens Street</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Category</label><br>
                                    <select name="brand_category[]" class="form-control form-control-sm" multiple>
                                    <option value="Jewellery" <?php if(in_array("Jewellery",$brand_category)){echo "selected";}?>>Jewellery</option>
                                    <option value="Restaurant"<?php if(in_array("Restaurant",$brand_category)){echo "selected";}?>>Restaurant</option>
                                    <option value="Clothing" <?php if(in_array("Clothing",$brand_category)){echo "selected";}?>>Clothing</option>
                                    <option value="Fitness" <?php if(in_array("Fitness",$brand_category)){echo "selected";}?>>Fitness</option>
                                    <option value="Toys" <?php if(in_array("Toys",$brand_category)){echo "selected";}?>>Toys</option>
                                    <option value="Shoes" <?php if(in_array("Shoes",$brand_category)){echo "selected";}?>>Shoes</option>
                                    <option value="Sports & Fitness"<?php if(in_array("Sports & Fitness",$brand_category)){echo "selected";}?>>Sports & Fitness</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Audience</label>
                                    <select name="brand_audience" class="form-control form-control-sm">
                                        <option value="Infants" <?php if($brand_audience == "Infants"){ echo "selected"; }?>>Infants</option>
                                        <option value="Kids" <?php if($brand_audience == "Kids"){ echo "selected"; }?>>Kids</option>
                                        <option value="Boys" <?php if($brand_audience == "Boys"){ echo "selected"; }?>>Boys</option>
                                        <option value="Girls" <?php if($brand_audience == "Girls"){ echo "selected"; }?>>Girls</option>
                                        <option value="Men" <?php if($brand_audience == "Men"){ echo "selected"; }?>>Men</option>
                                        <option value="Women" <?php if($brand_audience == "Women"){ echo "selected"; }?>>Women</option>
                                        <option value="Elderly" <?php if($brand_audience == "Elderly"){ echo "selected"; }?>>Elderly</option>
                                    </select>
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
                                    <textarea name="about_brand_offer" class="form-control form-control-sm ckeditor"><?=$about_brand_offer;?></textarea>
                                </div>

                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('brands');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function(){
    $(".week_hour_start").timepicker();
    $(".weekend_hour_start").timepicker();

});
$( document ).ready(function(){
    <?php if(empty($brand_id)){?>
    $('.week_hour_start').change(function(){
        var from_time = $('.week_hour_start').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        console.log(min_time);
        $(".week_end_time").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    })

    
    
    
    <?php } else { ?>
    var from_time = $('.week_hour_start').val();
    console.log(from_time);
    var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
    $(".week_end_time").timepicker({
        minTime: min_time,
        timeStep: 5
    });
    <?php } ?>
});
$( document ).ready(function(){
    <?php if(empty($brand_id)){?>
    $('.weekend_hour_start').change(function(){
        var from_time = $('.weekend_hour_start').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".weekend_end_hour").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    });
    <?php } else { ?>
    var from_time = $('.weekend_hour_start').val();
    var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
    $(".weekend_end_hour").timepicker({
        minTime: min_time,
        timeStep: 5
    });
    <?php } ?>
});


      
</script>