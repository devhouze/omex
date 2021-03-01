<?php
$event_id = ($events)?$events->event_id:'';
$action = (empty($events))?admin_url('add-events'):admin_url('edit-events/'.$event_id);
$event_name = ($events)?$events->event_name:'';
$date_available = ($events)?$events->date_available:'';
$start_date = ($events)?$events->start_date:'';
$end_date = ($events)?$events->end_date:'';
$thumbnail_message = ($events)?$events->thumbnail_message:'';
$event_type = ($events)?$events->event_type:'';
$event_location = ($events)?$events->event_location:'';
$event_start_time = ($events)?$events->event_start_time:'';
$event_end_time = ($events)?$events->event_end_time:'';
$event_label = ($events)?$events->event_label:'';
$about_event = ($events)?$events->about_event:'';
$event_street = ($events)?$events->event_street:'';
$event_category = ($events)?explode(",",$events->event_category):[];
$show_brand = ($events)?$events->show_brand:1;
$show_reg_btn = ($events)?$events->show_reg_btn:1;
$brands = ($events)?$events->brands:'';

?>
<script src="<?=base_url('assets/js/admin/events.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Events</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?=$action;?>" method="post" id="events_management" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row">
                                <input type="hidden" name="event_id" value="<?=$event_id;?>">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Event Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter event name" name="event_name" value="<?=$event_name;?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Date Availibility</label>
                                   <select name="date_availibility" id="date_availibility" class="form-control form-control-sm">
                                    <option selected="" disabled>Select Option</option>
                                    <option value="0" <?php if($date_available == 0){ echo "selected";}?>>Yes</option>
                                    <option value="1" <?php if($date_available == 1){ echo "selected";}?>>No</option>
                                   </select>
                                </div>

                                <div class="col-md-6 mb-3 date" <?php if($date_available == 0){?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?>>
                                    <label for="">Event Start Date</label>
                                    <input type="text" class="form-control form-control-sm input-sm datepicker" placeholder="Select date" name="start_date" value="<?=$start_date;?>">
                                </div>
                                <div class="col-md-6 mb-3 date" <?php if($date_available == 0){?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?>>
                                    <label for="">Event End Date</label>
                                    <input type="text" class="form-control form-control-sm input-sm datepicker" placeholder="Select date" name="end_date" value="<?=$end_date;?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Thumbnail</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="thumbnail_image" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Thumbnail Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_message" value="<?=$thumbnail_message;?>">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Event Type</label>
                                    <select name="event_type"class="form-control form-control-sm">
                                        <option selected="" disabled>Select Type</option>
                                        <option value="Virtual" <?php if($event_type == "Virtual"){ echo "selected";}?>>Virtual</option>
                                        <option value="Offline" <?php if($event_type == "Offline"){ echo "selected";}?>>Offline</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="event_location" value="<?=$event_location;?>">
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="">Event Start Time</label>
                                    <input type="text" name="event_start_time" class="form-control form-control-sm input-sm event_time" placeholder="Event Time" value="<?=$event_start_time;?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event End Time</label>
                                    <input type="text" name="event_end_time" class="form-control form-control-sm input-sm event_time" placeholder="Event Time" value="<?=$event_end_time;?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Event</label>
                                    <textarea name="about_event" class="form-control form-control-sm ckeditor"><?=$about_event;?></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Label</label><br>
                                    <select name="event_label" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Option</option>
                                        <option value="New" <?php if($event_label == "New"){echo "selected"; }?>>New</option>
                                        <option value="Popular" <?php if($event_label == "Popular"){echo "selected"; }?>>Popular</option>
                                        <option value="Coming Soon" <?php if($event_label == "Coming Soon"){echo "selected"; }?>>Coming Soon</option>
                                        <option value="Past" <?php if($event_label == "Past"){echo "selected"; }?>>Past</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Category</label>
                                    <select name="event_category[]"  class="form-control form-control-sm" multiple>
                                    <option value="Shop" <?php if(in_array("Shop",$event_category)){echo "selected";}?>>Shop</option>
                                    <option value="Eat" <?php if(in_array("Eat",$event_category)){echo "selected";}?>>Eat</option>
                                    <option value="Entertainment" <?php if(in_array("Entertainment",$event_category)){echo "selected";}?>>Entertainment</option>
                                    <option value="Festive Offers" <?php if(in_array("Festive Offers",$event_category)){echo "selected";}?>>Festive Offers</option>
                                    </select>
                                </div>                                

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Street</label>
                                    <select name="event_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Street</option>
                                        <option value="London Street" <?php if($event_street == "London Street"){echo "selected"; }?>>London Street</option>
                                        <option value="Paris Street" <?php if($event_street == "Paris Street"){echo "selected"; }?>>Paris Street</option>
                                        <option value="Hong Kong Street" <?php if($event_street == "Hong Kong Street"){echo "selected"; }?>>Hong Kong Street</option>
                                        <option value="Amsterdam Street" <?php if($event_street == "Amsterdam Street"){echo "selected"; }?>>Amsterdam Street</option>
                                        <option value="Portugal Street" <?php if($event_street == "Portugal Street"){echo "selected"; }?>>Portugal Street</option>
                                        <option value="San Francisco Street" <?php if($event_street == "San Francisco Street"){echo "selected"; }?>>San Francisco Street</option>
                                        <option value="Athens Street" <?php if($event_street == "Athens Street"){echo "selected"; }?>>Athens Street</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Show Brand Information</label>
                                    <select name="show_brand" id="show_brand" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Option</option>
                                        <option value="0" <?php if($show_brand == 0){echo "selected"; }?>>Yes</option>
                                        <option value="1" <?php if($show_brand == 1){echo "selected"; }?>>No</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 show_brand" <?php if($show_brand == 1){ ?> style="display:none;" <?php } else {?> style="display:block;"<?php } ?>>
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Brand</option>
                                        <?php if(!empty($brands_list)) { foreach($brands_list as $brand){?>
                                        <option value="<?=$brand['brand_id'];?>" <?php if($brand['brand_id'] == $brands){echo "selected"; }?>><?=$brand['brand_name'];?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Enable Register Button</label>
                                    <select name="show_reg_btn" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Option</option>
                                        <option value="0" <?php if($show_reg_btn == 0){echo "selected"; }?>>Yes</option>
                                        <option value="1" <?php if($show_reg_btn == 1){echo "selected"; }?>>No</option>
                                    </select>
                                </div>

                            </div>
                                
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('events');?>')">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$( document ).ready(function(){
    $(".event_time").timepicker();
});
</script>