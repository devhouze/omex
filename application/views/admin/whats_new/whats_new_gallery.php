<script src="<?=base_url('assets/js/admin/whats_new.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>What's New Gallery List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        What's New Gallery
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
                <div class="col-md-3 mb-3">
                    <input type="text" value="<?=$this->session->userdata('whats_new')['name'];?>" name="name" placeholder="Search By Name" class="form-control form-control-sm">
                </div>

                <?php $status = (!empty($this->session->userdata('whats_new')))?$this->session->userdata('whats_new')['status']:null;?>
                <div class="col-md-3 mb-3">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
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
                        <a href="<?=admin_url('add-whats-new-gallery')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name <a href="<?php echo admin_url('whats-new/'.$this->pagination->current_place().'/name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('whats-new/'.$this->pagination->current_place().'/name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On <a href="<?php echo admin_url('whats-new/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('whats-new/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <?php if($this->session->userdata('admin_details')['user_type'] == "0"){?>
                                    <th scope="col">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($whats_new_gallery)) { $sno = 1; foreach($whats_new_gallery as $wng){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$wng['name'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus_gallery" value="<?php echo $wng['id'];?>" <?php echo ($wng['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$wng['created_by'];?></td>
                                    <td><?=$wng['created_on'];?></td>
                                    <?php if($this->session->userdata('admin_details')['user_type'] == "0"){?>
                                    <td>
                                        <a href="<?=admin_url('edit-whats-new-gallery/'.$wng['id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete_gallery" data-id="<?=$wng['id'];?>"><span class="mdi mdi-delete"></span></a>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#whatsNewGallery" class="btn btn-primary view_whats_new_gallery" title="View Details" data-id="<?=$wng['id'];?>"><span class="mdi mdi-eye"></span></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } } else {?>
                                    <tr><td colspan="7">No record found</td></tr>
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

<div class="modal fade" id="whatsNewGallery" tabindex="-1" role="dialog" aria-labelledby="whats_newLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="whats_newLabel">What's New Gallery Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="whats_new_gallery"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>