<?php
$brand_id = ($brands) ? $brands->brand_id : '';
$action = (empty($brands)) ? admin_url('add-brands') : admin_url('edit-brands/' . $brand_id);
$brand_name = (!empty($brands)) ? $brands->brand_name : '';
$logo_message = (!empty($brands)) ? $brands->logo_message : '';
$brand_website = (!empty($brands)) ? $brands->brand_website : '';
$about_brand = (!empty($brands)) ? $brands->about_brand : '';
$brand_label = (!empty($brands)) ? $brands->brand_label : '';
$from_hour_week = (!empty($brands)) ? $brands->from_hour_week : '';
$to_week_hour = (!empty($brands)) ? $brands->to_week_hour : '';
$to_weekend_hour = (!empty($brands)) ? $brands->to_weekend_hour : '';
$from_hour_weekend = (!empty($brands)) ? $brands->from_hour_weekend : '';
$brand_location = (!empty($brands)) ? $brands->brand_location : '';
$brand_type = (!empty($brands)) ? $brands->brand_type : '';
$brand_contact = (!empty($brands)) ? $brands->brand_contact : '';
$brand_contact_email = (!empty($brands)) ? $brands->brand_contact_email : '';
$brand_sub_category = (!empty($brands)) ? explode(",", $brands->brand_sub_category) : [];
$store_map = (!empty($brands)) ? $brands->store_map : '';
$brand_street = (!empty($brands)) ? $brands->brand_street : '';
$brand_category = (!empty($brands)) ? explode(",", $brands->brand_category) : [];
$brand_audience = (!empty($brands)) ? $brands->brand_audience : '';
$show_on_home = (!empty($brands)) ? $brands->show_on_home : '';
$brand_offer_status = (!empty($brands)) ? $brands->brand_offer_status : '';
$order_home = (!empty($brands)) ? $brands->order_home : '';
$brand_logo = (!empty($brands)) ? $brands->brand_logo : '';
$banner_web = (!empty($brands)) ? $brands->banner_web : '';
$banner_mobile = (!empty($brands)) ? $brands->banner_mobile : '';
$about_brand_banner_web = (!empty($brands)) ? $brands->about_brand_banner_web : '';
$about_brand_banner_mobile = (!empty($brands)) ? $brands->about_brand_banner_mobile : '';


?>

<script src="<?= base_url('assets/js/admin/brands.js') ?>"></script>

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Brand</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= $action; ?>" method="post" id="brand_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="brand_id" value="<?= $brand_id; ?>">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter brand name" name="brand_name" value="<?= $brand_name; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_location" value="<?= $brand_location; ?>">
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Brand Website</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="brand_website" value="<?= $brand_website; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Logo(285px x 240px), PNG | JPG</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="brand_logo" onchange="checkFileDetails(285,240,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Banner Web(1283px x 450px), PNG | JPG | JPEG</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="banner_web" onchange="checkFileDetails(1283,450,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                
                                
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/brand/" . $brand_logo)) { ?>

                                        <img src="<?php echo base_url("assets/images/public/brand/" . $brand_logo); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/brand/" . $about_brand_banner_web)) { ?>

                                        <img src="<?php echo base_url("assets/images/public/brand/" . $about_brand_banner_web); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } ?>
                                </div>
                            
                            </div>
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="">Logo Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="logo_comment" value="<?= $logo_message; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Banner Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="banner_comment" value="<?= $logo_message; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Banner Mobile(748px x 1102px), PNG | JPG</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="banner_mobile" onchange="checkFileDetails(748,1102,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">About Brand Banner (748px X 1102px), PNG | JPG</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="about_brand_banner_web" onchange="checkFileDetails(748,1102,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/brand/" . $banner_mobile)) { ?>

                                        <img src="<?php echo base_url("assets/images/public/brand/" . $banner_mobile); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/brand/" . $about_brand_banner_web)) { ?>

                                        <img src="<?php echo base_url("assets/images/public/brand/" . $about_brand_banner_web); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } ?>
                                </div>
                            
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="">About Brand Banner Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="about_brand_banner_alt" value="<?= $logo_message; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Label</label>
                                    <select name="brand_label" class="form-control form-control-sm select-box">
                                        <option value="">Select Label</option>
                                        <option value="New In" <?php if ($brand_label == "New In") {
                                                                    echo 'selected';
                                                                } ?>>New In</option>
                                        <option value="Sale & Offers" <?php if ($brand_label == "Sale & Offers") {
                                                                            echo 'selected';
                                                                        } ?>>Sale & Offers</option>
                                        <option value="Popular" <?php if ($brand_label == "Popular") {
                                                                    'selected';
                                                                } ?>>Popular</option>
                                        <option value="Exclusive WS" <?php if ($brand_label == "Exclusive WS") {
                                                                            'selected';
                                                                        } ?>>Exclusive WS</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="">About Brand</label>
                                    <textarea name="about_brand" class="form-control form-control-sm ckeditor"><?= $about_brand; ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Feature On Home Page (Under top brands)</label><br>
                                    <select name="show_on_home" class="form-control form-control-sm select-box">
                                        <option value="">Select Option</option>
                                        <option value="Yes" <?php if ($show_on_home == "Yes") {
                                                                echo "selected";
                                                            } ?>>Yes</option>
                                        <option value="No" <?php if ($show_on_home == "No") {
                                                                echo "selected";
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Weekday Operational Start Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm week_hour_start" name="from_week_hour" value="<?= $from_hour_week; ?>">
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Weekday Operational End Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm week_end_time" name="to_week_hour" value="<?= $to_week_hour; ?>">
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Weekend Operational Start Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm weekend_hour_start" name="from_weekend_hour" value="<?= $from_hour_weekend; ?>">
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Weekend Operational End Time</label>
                                    <input type="text" class="form-control form-control-sm input-sm weekend_end_hour" name="to_weekend_hour" value="<?= $to_weekend_hour; ?>">
                                </div>

                                

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Type (For homepage & street display)</label><br>
                                    <select name="brand_type" class="form-control form-control-sm select-box">
                                        <option value="">Select Brand Type</option>
                                        <option value="Play" <?php if ($brand_type == "Play") {
                                                                    echo "selected";
                                                                } ?>>Play</option>
                                        <option value="Eat" <?php if ($brand_type == "Eat") {
                                                                echo "selected";
                                                            } ?>>Eat</option>
                                        <option value="Style" <?php if ($brand_type == "Style") {
                                                                    echo "selected";
                                                                } ?>>Style</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Contact Number</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="e.g.:9876543210" pattern="[/^[0-9]{10}$/]" name="brand_contact" value="<?= $brand_contact; ?>">
                                </div>


                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Brand Email Contact</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="email_contact" value="<?= $brand_contact_email; ?>">
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Store Map URL</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="store_map" value="<?= $store_map; ?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Street</label>
                                    <select name="brand_street" class="form-control form-control-sm select-box">
                                        <option value="">Select Street</option>
                                        <option value="London Street" <?php if ($brand_street == "London Street") {
                                                                            echo "selected";
                                                                        } ?>>London Street</option>
                                        <option value="Paris Street" <?php if ($brand_street == "Paris Street") {
                                                                            echo "selected";
                                                                        } ?>>Paris Street</option>
                                        <option value="Hong Kong Street" <?php if ($brand_street == "Hong Kong Street") {
                                                                                echo "selected";
                                                                            } ?>>Hong Kong Street</option>
                                        <option value="Amsterdam Street" <?php if ($brand_street == "Amsterdam Street") {
                                                                                echo "selected";
                                                                            } ?>>Amsterdam Street</option>
                                        <option value="Portugal Street" <?php if ($brand_street == "Portugal Street") {
                                                                            echo "selected";
                                                                        } ?>>Portugal Street</option>
                                        <option value="San Francisco Street" <?php if ($brand_street == "San Francisco Street") {
                                                                                    echo "selected";
                                                                                } ?>>San Francisco Street</option>
                                        <option value="Athens Street" <?php if ($brand_street == "Athens Street") {
                                                                            echo "selected";
                                                                        } ?>>Athens Street</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 d-none">
                                    <label for="">Brand Audience</label>
                                    <select name="brand_audience" class="form-control form-control-sm select-box">
                                        <option value="">Select Audience</option>
                                        <option value="Infants" <?php if ($brand_audience == "Infants") {
                                                                    echo "selected";
                                                                } ?>>Infants</option>
                                        <option value="Kids" <?php if ($brand_audience == "Kids") {
                                                                    echo "selected";
                                                                } ?>>Kids</option>
                                        <option value="Boys" <?php if ($brand_audience == "Boys") {
                                                                    echo "selected";
                                                                } ?>>Boys</option>
                                        <option value="Girls" <?php if ($brand_audience == "Girls") {
                                                                    echo "selected";
                                                                } ?>>Girls</option>
                                        <option value="Men" <?php if ($brand_audience == "Men") {
                                                                echo "selected";
                                                            } ?>>Men</option>
                                        <option value="Women" <?php if ($brand_audience == "Women") {
                                                                    echo "selected";
                                                                } ?>>Women</option>
                                        <option value="Elderly" <?php if ($brand_audience == "Elderly") {
                                                                    echo "selected";
                                                                } ?>>Elderly</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Category</label><br>
                                    <select name="brand_category[]" id="category" class="form-control form-control-sm select-box" multiple>
                                        <?php if (!empty($category)) {
                                            foreach ($category as $cat) { ?>
                                                <option value="<?php echo $cat['id']; ?>" data-id="<?php echo $cat['id'];?>" <?php if (in_array($cat['category_name'], $brand_category)) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $cat['category_name']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Brand Sub Category</label>
                                    <select name="sub_category[]" id="sub_category" class="form-control form-control-sm select-box" multiple>
                                        <?php if (!empty($sub_category)) {
                                            foreach ($sub_category as $sc) { ?>
                                                <option value="<?php echo $sc['name']; ?>" <?php if (in_array($sc['name'], $brand_sub_category)) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $sc['name']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3" style="display:none">
                                    <label for="">Activate Brand Offer</label><br>
                                    <select name="show_brand_offers" class="form-control form-control-sm select-box">
                                        <option value="">Select Offer Status</option>
                                        <option value="Yes" <?php if ($brand_offer_status == "Yes") {
                                                                echo "selected";
                                                            } ?>>Yes</option>
                                        <option value="No" <?php if ($brand_offer_status == "No") {
                                                                echo "selected";
                                                            } ?>>No</option>
                                    </select>
                                </div>

                            </div>

                            <button class="btn btn-primary submit-form" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?= admin_url('brands'); ?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".week_hour_start").timepicker({
            minTime: "00:00",
            timeStep: 5
        });
        $(".weekend_hour_start").timepicker({
            minTime: "00:00",
            timeStep: 5
        });

    });
    $(document).ready(function() {
        <?php if (empty($brand_id)) { ?>
            $('.week_hour_start').change(function() {
                var from_time = $('.week_hour_start').val();
                var min_time = moment.utc(from_time, 'hh:mm').add(1, 'hour').format('hh:mm');
                $(".week_end_time").timepicker({
                    minTime: min_time,
                    timeStep: 5
                });
            })
        <?php } else { ?>
            var from_time = $('.week_hour_start').val();
            var min_time = moment.utc(from_time, 'hh:mm').add(1, 'hour').format('hh:mm');
            $(".week_end_time").timepicker({
                minTime: min_time,
                timeStep: 5
            });
        <?php } ?>
    });
    $(document).ready(function() {
        <?php if (empty($brand_id)) { ?>
            $('.weekend_hour_start').change(function() {
                var from_time = $('.weekend_hour_start').val();
                var min_time = moment.utc(from_time, 'hh:mm').add(1, 'hour').format('hh:mm');
                $(".weekend_end_hour").timepicker({
                    minTime: min_time,
                    timeStep: 5
                });
            });
        <?php } else { ?>
            var from_time = $('.weekend_hour_start').val();
            var min_time = moment.utc(from_time, 'hh:mm').add(1, 'hour').format('hh:mm');
            $(".weekend_end_hour").timepicker({
                minTime: min_time,
                timeStep: 5
            });
        <?php } ?>
    });
</script>