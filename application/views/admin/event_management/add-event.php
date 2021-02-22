<?php
$event_id = ($events)?$events->event_id:'';
$action = (empty($events))?admin_url('add-events'):admin_url('edit-events/'.$event_id);

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
                        <form action="<?=$action;?>" method="post" id="events_management" autocomplete="off">
                            <div class="form-row">
                                <input type="hidden" name="event_id" value="<?=$event_id;?>">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Event Name</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Enter event name" name="event_name" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Date Availibility</label>
                                   <select name="date_availibility" id="date_availibility" class="form-control form-control-sm">
                                    <option selected="" disabled>Select Option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                   </select>
                                </div>

                                <div class="col-md-6 mb-3 date" style="display:none;">
                                    <label for="">Event Start Date</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Select date" name="start_date" value="">
                                </div>
                                <div class="col-md-6 mb-3 date" style="display:none;">
                                    <label for="">Event End Date</label>
                                    <input type="text" class="form-control form-control-sm input-sm" placeholder="Select date" name="end_date" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Thumbnail</label>
                                    <input type="file" class="form-control form-control-sm input-sm" name="thumbnail_image" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Thumbnail Comment</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="thumbnail_message" value="">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Event Type</label>
                                    <select name="event_type"class="form-control form-control-sm">
                                        <option selected="" disabled>Select Type</option>
                                        <option value="Virtual">Virtual</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Location</label>
                                    <input type="text" class="form-control form-control-sm input-sm" name="event_location" value="">
                                </div>
                               
                                <div class="col-md-12 mb-3">
                                    <label for="">Event Time</label>
                                    <input type="password" name="password" class="form-control form-control-sm input-sm" placeholder="Password">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="">About Event</label>
                                    <textarea name="about_event" class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Label</label><br>
                                    <input type="radio" name="event_label" value="New"> New
                                    <input type="radio" name="event_label" value="Popular"> Popular
                                    <input type="radio" name="event_label" value="Coming Soon"> Coming Soon
                                    <input type="radio" name="event_label" value="Past"> Past
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Category</label><br>
                                    <input type="checkbox" name="event_category" value="Shop"> Shop
                                    <input type="checkbox" name="event_category" value="Eat"> Eat
                                    <input type="checkbox" name="event_category" value="Entertainment"> Entertainment
                                    <input type="checkbox" name="event_category" value="Festive Offers"> Festive Offers
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Event Street</label>
                                    <select name="event_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Street</option>
                                        <option value="London Street">London Street</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Show Brand Information</label>
                                    <select name="event_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Option<Option></Option></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3 show_brand" style="display:none;">
                                    <label for="">Select Brand</label>
                                    <select name="event_street" class="form-control form-control-sm">
                                        <option selected="" disabled>Select Brand<Option></Option></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
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