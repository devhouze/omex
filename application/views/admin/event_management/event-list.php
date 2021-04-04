<script src="<?=base_url('assets/js/admin/events.js')?>"></script>
<?php 
if(!empty($this->uri->segment(4))){
    $order = $this->uri->segment(4);
} else {
    $order = 'desc';
}

?>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Events Overview</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Events
                    </li>
                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                <div class="card-body">
                <form action="" method="post">
                <div class="form-row">
                <div class="col-md-3">
                        <input type="text" value="<?=$this->session->userdata('event')['event_name'];?>" name="name" placeholder="Search By Name" class="form-control form-control-sm">
                </div>
                
                <?php $status = (!empty($this->session->userdata('event')))?$this->session->userdata('event')['status']:null;?>
                <?php $event_type = (!empty($this->session->userdata('event')))?$this->session->userdata('event')['event_type']:null;?>
                <div class="col-md-3">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="event_type" class="form-control form-control-sm">
                        <option selected disabled>Event Type</option>
                        <option value="Virtual" <?php if($event_type == "Virtual"){ echo "selected";}?>>Virtual</option>
                        <option value="Offline" <?php if($event_type == "Offline"){ echo "selected";}?>>Offline</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="submit" name="search" class="btn btn-primary" value="Search">
                    <input type="submit" name="reset" class="btn btn-danger" value="Reset">
                </div>
                
                </form>
                </div>
                </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-events')?>" class="btn btn-primary">Add</a>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event Name <a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/event_name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/event_name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Event Date<a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/start_date/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/start_date/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <!-- <th scope="col">Event Type</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On<a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('events/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($events)) {  $sno = 1 + $_SESSION['page']; foreach($events as $event){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$event['event_name'];?></td>
                                    <td><?=($event['date_available'] != '1')?(date('d M Y',strtotime($event['start_date']))." to ".date('d M Y',strtotime($event['end_date']))):'N/A';?></td>
                                    <!-- <td><?=$event['event_type'];?></td> -->
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" <?php //if($event['date_available'] == 0 && date('Y-m-d',strtotime($event['end_date'])) < date('Y-m-d')){ echo "disabled";}?> class="chkstatus" value="<?php echo $event['event_id'];?>" <?php echo ($event['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$event['created_by'];?></td>
                                    <td><?=date('d M Y',strtotime($event['created_on']));?></td>
                                    <td>
                                        <a href="<?=admin_url('edit-events/'.$event['event_id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?=$event['event_id'];?>"><span class="mdi mdi-delete"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-primary view_detail" data-id="<?=$event['event_id'];?>" data-toggle="modal" data-target="#eventDetail"><span class="mdi mdi-eye"></span></a>
                                    </td>
                                </tr>
                                <?php } } else {?>
                                    <tr><td colspan="8">No record found</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="total_count"><?=$result_count;?></div>
                        <div class="pagination" style="float:right;"><?=$pagination['links'];?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Show event details modal -->
<div class="modal fade" id="eventDetail" tabindex="-1" role="dialog" aria-labelledby="eventDetailLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventDetailLabel">Event Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="details"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>