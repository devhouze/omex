<script src="<?=base_url('assets/js/admin/events.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Events List</h1>

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
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-events')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">Event Date</th>
                                    <th scope="col">Event Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($events)) { $sno = 1; foreach($events as $event){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$event['event_name'];?></td>
                                    <td><?=($event['date_available'] != '1')?($event['start_date']."-".$event['end_date']):'N/A';?></td>
                                    <td><?=$event['event_type'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus" value="<?php echo $event['event_id'];?>" <?php echo ($event['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$event['created_by'];?></td>
                                    <td><?=$event['created_on'];?></td>
                                    <td>
                                        <a href="<?=admin_url('edit-events/'.$event['event_id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?=$event['event_id'];?>"><span class="mdi mdi-delete"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-primary view_detail" data-id="<?=$event['event_id'];?>"><span class="mdi mdi-eye"></span></a>
                                    </td>
                                </tr>
                                <?php } } else {?>
                                    <tr><td colspan="4">No record found</td></tr>
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