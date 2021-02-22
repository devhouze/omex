<?php
$brand_id = ($brands)?$brands->brand_id:'';
$action = (empty($brands))?admin_url('add-brands'):admin_url('edit-brands/'.$brand_id);

?>
<link rel="stylesheet" href="<?=base_url('assets/css/admin/timepicker.css')?>">
<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<script src="<?=base_url('assets/js/admin/timepicker.js')?>"></script>
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
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter brand name" name="brand_name" value="">
                                    <span class="text-danger brand_name errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Logo</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="brand_logo">
                                    <span class="text-danger brand_logo errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Logo Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="logo_comment" value="">
                                    <span class="text-danger logo_comment errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Website</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_website" value="">
                                    <span class="text-danger brand_website errors_msg"></span>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Brand</label>
                                    <textarea name="about_brand" class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Label</label>
                                    <select name="brand_label" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Label</option>
                                        <option value="New In">New In</option>
                                        <option value="Sale & Offers">Sale & Offers</option>
                                        <option value="Popular">Popular</option>
                                        <option value="Exclusive WS">Exclusive WS</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">From Operation Hour(Week)</label>
                                    <input type="text" class="form-control form-control-sm input-sm from_week_hour" name="from_week_hour" value="">
                                    <span class="text-danger from_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">To Operation Hour(Week)</label>
                                    <input type="text" class="form-control form-control-sm input-sm to_week_hour" name="to_week_hour" value="">
                                    <span class="text-danger to_week_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">From Operation Hour(Weekend)</label>
                                    <input type="text" class="form-control form-control-sm input-sm from_weekend_hour" name="from_weekend_hour" value="">
                                    <span class="text-danger from_weekend_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">To Operation Hour(Weekend)</label>
                                    <input type="text" class="form-control form-control-sm input-sm to_weekend_hour" name="to_weekend_hour" value="">
                                    <span class="text-danger to_weekend_hour errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_location" value="">
                                    <span class="text-danger brand_location errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Type</label><br>
                                    <select name="brand_type" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Type</option>
                                        <option value="Shop">Shop</option>
                                        <option value="Eat">Eat</option>
                                        <option value="Entertainment">Entertainment</option>
                                        <option value="Other">Other </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_contact" value="">
                                    <span class="text-danger brand_contact errors_msg"></span>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Sub Categoory</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="sub_category" value="">
                                    <span class="text-danger sub_category errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="email_contact" value="">
                                    <span class="text-danger email_contact errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Store Map</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="store_map" value="">
                                    <span class="text-danger store_map errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Street</label>
                                    <select name="brand_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Street</option>
                                        <option value="London Street">London Street</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">Brand Category</label><br>
                                    <input type="checkbox" name="brand_category" value="Jewellery"> Jewellery
                                    <input type="checkbox" name="brand_category" value="Restaurant"> Restaurant
                                    <input type="checkbox" name="brand_category" value="Clothing"> Clothing
                                    <input type="checkbox" name="brand_category" value="Fitness"> Fitness
                                    <input type="checkbox" name="brand_category" value="Toys"> Toys
                                    <input type="checkbox" name="brand_category" value="Shoes"> Shoes
                                    <input type="checkbox" name="brand_category" value="Sports & Fitness"> Sports & Fitness
                                    <br>
                                    <span class="text-danger brand_category errors_msg"></span>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Audience</label><br>
                                    <input type="radio" name="brand_audience" value="Infants"> Infants
                                    <input type="radio" name="brand_audience" value="Kids"> Kids
                                    <input type="radio" name="brand_audience" value="Boys"> Boys
                                    <input type="radio" name="brand_audience" value="Girls"> Girls
                                    <input type="radio" name="brand_audience" value="Men"> Men
                                    <input type="radio" name="brand_audience" value="Women"> Women
                                    <input type="radio" name="brand_audience" value="Elderly"> Elderly
                                    <br>
                                    <span class="text-danger brand_audience errors_msg"></span>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="">Feature On Home Page</label><br>
                                    <input type="radio" name="show_on_home" value="Yes"> Yes
                                    <input type="radio" name="show_on_home" value="No"> No
                                    <br>
                                    <span class="text-danger show_on_home errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Activate Brand Offer</label><br>
                                    <input type="radio" name="show_brand_offer" value="Yes" class="show_brand_offers"> Yes
                                    <input type="radio" name="show_brand_offer" value="No" class="show_brand_offers"> No
                                    <br>
                                    <span class="text-danger show_brand_offer errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer">
                                    <label for="">Brand Offer Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_offer_name" value="">
                                    <span class="text-danger brand_offer_name errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer">
                                    <label for="">Brand Label Custom Offer</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_custom_offer" value="">
                                    <span class="text-danger brand_custom_offer errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer">
                                    <label for="">Brand Offer Validity</label>
                                    <input type="text" class="form-control form-control-sm input-sm datepicker" name="offer_validity" value="">
                                    <span class="text-danger offer_validity errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer">
                                    <label for="">Brand Offer Thumbnail</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="offer_thumbnail" value="">
                                    <span class="text-danger offer_thumbnail errors_msg"></span>
                                </div>

                                <div class="col-md-6 mb-3 brand_offer">
                                    <label for="">Brand Offer Thumbnail Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_message" value="">
                                    <span class="text-danger thumbnail_message errors_msg"></span>
                                </div>

                                <div class="col-md-12 mb-3 brand_offer">
                                    <label for="">About Brand Offer</label>
                                    <textarea name="about_brand_offer" class="form-control form-control-sm"></textarea>
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
    $('.from_week_hour').change(function(){
        var from_time = $('.from_week_hour').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".to_week_hour").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    });
});
$( document ).ready(function(){
    $('.from_weekend_hour').change(function(){
        var from_time = $('.from_weekend_hour').val();
        var min_time = moment.utc(from_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".to_weekend_hour").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    });
});


      
</script>