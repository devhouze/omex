<?php
$event_id = ($events)?$events->event_id:'';
$action = (empty($events))?admin_url('add-events'):admin_url('edit-events/'.$event_id);
$event_name = ($events)?$events->event_name:'';
$date_available = ($events)?$events->date_available:'1';
$start_date = ($events)?$events->start_date:'';
$end_date = ($events)?$events->end_date:'';
$thumbnail_message = ($events)?$events->thumbnail_message:'';
$event_type = ($events)?$events->event_type:'';
$event_location = ($events)?$events->event_location:'';
$event_start_time = ($events)?$events->event_start_time:'';
$event_end_time = ($events)?$events->event_end_time:'';
$event_label = ($events)?$events->event_label:'';
$about_event = ($events)?$events->about_event:'';
$event_street = ($events)?explode(',',$events->event_street):'';
$event_category = ($events)?explode(",",$events->event_category):[];
$show_brand = ($events)?$events->show_brand:1;
$show_reg_btn = ($events)?$events->show_reg_btn:1;
$brands = ($events)?$events->brands:'';
$thumbnail_image = ($events)?$events->thumbnail_image:'';
$meta_title = (!empty($events)) ? $events->meta_title :'';
$meta_keyword = (!empty($events)) ? $events->meta_keyword :'';
$meta_description = (!empty($events)) ? $events->meta_description :'';
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
                                    <input type="text" class="form-control form-control-sm input-sm start_date" placeholder="Select date" name="start_date" value="<?=$start_date;?>">
                                </div>
                                <div class="col-md-6 mb-3 date" <?php if($date_available == 0){?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?>>
                                    <label for="">Event End Date</label>
                                    <input type="text" class="form-control form-control-sm input-sm end_date" placeholder="Select date" name="end_date" value="<?=$end_date;?>">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Banner(700px * 500px), JPG | PNG</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="thumbnail_image" value="" onchange="checkFileDetails(700,500,this)">
                                    <span style="color: red;font-size: 9px;"></span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Banner Alt Tag</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_message" value="<?=$thumbnail_message;?>">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <?php if (is_file("assets/images/public/home/" . $thumbnail_image)) { ?>

                                        <img src="<?php echo base_url("assets/images/public/home/" . $thumbnail_image); ?>" class="img-thumb" style="width:100px !important;" />
                                    <?php } ?>
                                </div>
                               

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="event_location" value="<?=$event_location;?>">
                                </div>
                               
                                <div class="col-md-6 mb-3 start_time" <?php if($date_available == 0){?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?>>
                                    <label for="">Event Start Time</label>
                                    <input type="text" name="event_start_time" class="form-control form-control-sm input-sm event_start_time" placeholder="Event Start Time" value="<?=$event_start_time;?>">
                                </div>

                                <div class="col-md-6 mb-3 end_time" <?php if($date_available == 0){?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?>>
                                    <label for="">Event End Time</label>
                                    <input type="text" name="event_end_time" class="form-control form-control-sm input-sm event_end_time" placeholder="Event End Time" value="<?=$event_end_time;?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Event</label>
                                    <textarea name="about_event" class="form-control form-control-sm ckeditor"><?=$about_event;?></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Label</label><br>
                                    <select name="event_label" class="form-control form-control-sm select-box">
                                    <option value="">Select Label</option>
                                        <option value="New" <?php if($event_label == "New"){echo "selected"; }?>>New</option>
                                        <option value="Popular" <?php if($event_label == "Popular"){echo "selected"; }?>>Popular</option>
                                        <option value="Coming Soon" <?php if($event_label == "Coming Soon"){echo "selected"; }?>>Coming Soon</option>
                                        <option value="Past" <?php if($event_label == "Past"){echo "selected"; }?>>Past</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Category</label>
                                    <select name="event_category[]"  class="form-control form-control-sm select-box" multiple>
                                    <option value="Live Music Show" <?php if(in_array("Live Music Show",$event_category)){echo "selected";}?>>Live Music Show</option>
                                    <option value="Kids Workshop" <?php if(in_array("Kids Workshop",$event_category)){echo "selected";}?>>Kids Workshop</option>
                                    <option value="Performing Arts" <?php if(in_array("Performing Arts",$event_category)){echo "selected";}?>>Performing Arts</option>
                                    <option value="National Festival" <?php if(in_array("National Festival",$event_category)){echo "selected";}?>>National Festival</option>
                                    <option value="Talks" <?php if(in_array("Talks",$event_category)){echo "selected";}?>>Talks</option>
                                    <option value="Brand Preview" <?php if(in_array("Brand Preview",$event_category)){echo "selected";}?>>Brand Preview</option>
                                    <option value="Brand Sale" <?php if(in_array("Brand Sale",$event_category)){echo "selected";}?>>Brand Sale</option>
                                    <option value="Festival Bonanza" <?php if(in_array("Festival Bonanza",$event_category)){echo "selected";}?>>Festival Bonanza</option>
                                    <option value="Sale Festival" <?php if(in_array("Sale Festival",$event_category)){echo "selected";}?>>Sale Festival</option>
                                    <option value="Charity" <?php if(in_array("Charity",$event_category)){echo "selected";}?>>Charity</option>
                                    <option value="Fund Raising" <?php if(in_array("Fund Raising",$event_category)){echo "selected";}?>>Fund Raising</option>
                                    <option value="Cleanliness Drive" <?php if(in_array("Cleanliness Drive",$event_category)){echo "selected";}?>>Cleanliness Drive</option>
                                    <option value="Celebrity Shoot" <?php if(in_array("Celebrity Shoot",$event_category)){echo "selected";}?>>Celebrity Shoot</option>
                                    <option value="Entertainment" <?php if(in_array("Entertainment",$event_category)){echo "selected";}?>>Entertainment</option>
                                    <option value="Photography" <?php if(in_array("Photography",$event_category)){echo "selected";}?>>Photography</option>
                                    <option value="Live Food" <?php if(in_array("Live Food",$event_category)){echo "selected";}?>>Live Food</option>
                                    <option value="Family Fun" <?php if(in_array("Family Fun",$event_category)){echo "selected";}?>>Family Fun</option>
                                    <option value="Exhibitions & Fairs" <?php if(in_array("Exhibitions & Fairs",$event_category)){echo "selected";}?>>Exhibitions & Fairs</option>
                                    <option value="Fashion" <?php if(in_array("Fashion",$event_category)){echo "selected";}?>>Fashion</option>
                                    <option value="Sports & Fitness" <?php if(in_array("Sports & Fitness",$event_category)){echo "selected";}?>>Sports & Fitness</option>
                                    <option value="Beauty" <?php if(in_array("Beauty",$event_category)){echo "selected";}?>>Beauty</option>
                                    <option value="Party & Drinks" <?php if(in_array("Party & Drinks",$event_category)){echo "selected";}?>>Party & Drinks</option>
                                    <option value="Social Cause" <?php if(in_array("Social Cause",$event_category)){echo "selected";}?>>Social Cause</option>
                                    <option value="WS Tour" <?php if(in_array("WS Tour",$event_category)){echo "selected";}?>>WS Tour</option>
                                    <option value="Kids Fun" <?php if(in_array("Kids Fun",$event_category)){echo "selected";}?>>Kids Fun</option>
                                    <option value="Hi-Tea" <?php if(in_array("Hi-Tea",$event_category)){echo "selected";}?>>Hi-Tea</option>
                                    <option value="Comedy Show" <?php if(in_array("Comedy Show",$event_category)){echo "selected";}?>>Comedy Show</option>
                                    </select>
                                </div>                                

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Street</label>
                                    <select name="event_street[]" class="form-control form-control-sm select-box" multiple>
                                        <option value="London Street" <?php if(in_array("London Street",$event_street)){echo "selected"; }?>>London Street</option>
                                        <option value="Paris Street" <?php if(in_array("Paris Street",$event_street)){echo "selected"; }?>>Paris Street</option>
                                        <option value="Hong Kong Street" <?php if(in_array("Hong Kong Street",$event_street)){echo "selected"; }?>>Hong Kong Street</option>
                                        <option value="Amsterdam Street" <?php if(in_array("Amsterdam Street",$event_street)){echo "selected"; }?>>Amsterdam Street</option>
                                        <option value="Portugal Street" <?php if(in_array("Portugal Street",$event_street)){echo "selected"; }?>>Portugal Street</option>
                                        <option value="San Francisco Street" <?php if(in_array("San Francisco Street",$event_street)){echo "selected"; }?>>San Francisco Street</option>
                                        <option value="Athens Street" <?php if(in_array("Athens Street",$event_street)){echo "selected"; }?>>Athens Street</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3" style="display:none;">
                                    <label for="">Show Brand Information</label>
                                    <select name="show_brand" id="show_brand" class="form-control form-control-sm">
                                        <option value="">Select Option</option>
                                        <option value="0" <?php if($show_brand == 0){echo "selected"; }?>>Yes</option>
                                        <option value="1" <?php if($show_brand == 1){echo "selected"; }?>>No</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 show_brand" <?php if($show_brand == 1){ ?> style="display:none;" <?php } else {?> style="display:block;"<?php } ?>>
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-control form-control-sm">
                                        <option value>Select Brand</option>
                                        <?php if(!empty($brands_list)) { foreach($brands_list as $brand){?>
                                        <option value="<?=$brand['brand_id'];?>" <?php if($brand['brand_id'] == $brands){echo "selected"; }?>><?=$brand['brand_name'];?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Enable Register Button</label>
                                    <select name="show_reg_btn" class="form-control form-control-sm">
                                        <option value>Select Option</option>
                                        <option value="0" <?php if($show_reg_btn == 0){echo "selected"; }?>>Yes</option>
                                        <option value="1" <?php if($show_reg_btn == 1){echo "selected"; }?>>No</option>
                                    </select>
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="meta_title" value="<?=$meta_title;?>">
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="meta_keyword" value="<?=$meta_keyword;?>">
                                </div>

                                 <div class="col-md-12 mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control form-control-sm " rows="5"><?= $meta_description; ?></textarea>
                                </div>

                            </div>
                                
                            <button class="btn btn-primary submit-form" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" onclick="window.location.replace('<?=admin_url('events');?>')">Go Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$( document ).ready(function(){
    $(".event_start_time").timepicker({
        minTime: '00:00',
        timeStep: 5
    });

    $(".event_start_time").change(function(){
        var start_time = $('.event_start_time').val();
        var min_time = moment.utc(start_time,'hh:mm').add(1,'hour').format('hh:mm');
        $(".event_end_time").timepicker({
            minTime: min_time,
            timeStep: 5
        });
    })
});
$(function() {
    $( ".start_date" ).datepicker({
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        minDate: new Date(),
        maxDate: '+30Y',
        onSelect: function(date){
        var selectedDate = new Date(date);
        var endDate = new Date(selectedDate);
        //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
        $(".end_date").datepicker( "option", "minDate", endDate );
        $(".end_date").datepicker( "option", "maxDate", '+2y' );
    }
    });

    $(".end_date").datepicker({ 
    dateFormat: 'yy-mm-dd',
    minDate: new Date(),
    changeMonth: true
});
});

</script>
