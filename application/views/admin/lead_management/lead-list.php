<script src="<?=base_url('assets/js/admin/lead_management.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Lead List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Leads
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
                <div class="col-md-3 mt-3">
                    <input type="text" value="<?=$this->session->userdata('lead')['name'];?>" name="name" placeholder="Search By Name" class="form-control form-control-sm">
                </div>

                <?php $query_type = (!empty($this->session->userdata('lead')))?$this->session->userdata('lead')['query_type']:null;?>
                <div class="col-md-3 mt-3">
                    <select name="query_type" class="form-control form-control-sm">
                        <option selected disabled>Select Query Type</option>
                        <option value="General Enquiry" <?php if($query_type == "General Enquiry"){ echo "selected";}?>>General Enquiry</option>
                        <option value="Promotion/Events" <?php if($query_type == "Promotion/Events"){ echo "selected";}?>>Promotion/Events</option>
                        <option value="Customer feedback" <?php if($query_type == "Customer feedback"){ echo "selected";}?>>Customer feedback</option>
                        <option value="Renting/Leasing" <?php if($query_type == "Renting/Leasing"){ echo "selected";}?>>Renting/Leasing</option>
                        <option value="New Brand Registration" <?php if($query_type == "New Brand Registration"){ echo "selected";}?>>New Brand Registration</option>
                        <option value="Commercial Buyer" <?php if($query_type == "Commercial Buyer"){ echo "selected";}?>>Commercial Buyer</option>
                        <option value="Partnership" <?php if($query_type == "Partnership"){ echo "selected";}?>>Partnership</option>
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <input type="text" value="<?=$this->session->userdata('lead')['date_from'];?>" name="from_date" placeholder="Date from" class="form-control form-control-sm datepicker">
                </div>

                <div class="col-md-3 mt-3">
                    <input type="text" value="<?=$this->session->userdata('lead')['date_to'];?>" name="to_date" placeholder="Date to" class="form-control form-control-sm datepicker">
                </div>

                <div class="col-md-3 mt-3">
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
                        <a href="<?=admin_url('export-leads')?>" class="btn btn-primary">Export CSV</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Email <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/email/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/email/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Source <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/source/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/source/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Event Name <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/event_name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/event_name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Query Type <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/query_type/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/query_type/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Sign Up Time <a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/registered_at/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('leads/'.$this->pagination->current_place().'/registered_at/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($leads)) { $sno = 1; foreach($leads as $lead){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$lead['name'];?></td>
                                    <td><?=$lead['email'];?></td>
                                    <td><?=$lead['contact'];?></td>
                                    <td><?=$lead['source'];?></td>
                                    <td><?=$lead['event_name'];?></td>
                                    <td><?=$lead['query_type'];?></td>
                                    <td><?=$lead['registered_at'];?></td>
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#message" class="btn btn-primary view_message" title="View Message" data-id="<?=$lead['id'];?>"><span class="mdi mdi-eye"></span></a></td>
                                </tr>
                                <?php } } else {?>
                                    <tr><td colspan="9">No record found</td></tr>
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

<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="message"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>