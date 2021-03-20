<script src="<?=base_url('assets/js/admin/gallery.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Gallery List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Gallery
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

                <?php $media_type = (!empty($this->session->userdata('gallery')))?$this->session->userdata('gallery')['media_type']:null;?>
                <div class="col-md-3">
                    <select name="media_type" class="form-control form-control-sm">
                        <option selected disabled>Select File Type</option>
                        <option value="1" <?php if($media_type == "1"){ echo "selected";}?>>Image</option>
                        <option value="2" <?php if($media_type == "2"){ echo "selected";}?>>Video</option>
                        <option value="3" <?php if($media_type == "3"){ echo "selected";}?>>YouTube Link</option>
                    </select>
                </div>
                <?php $status = (!empty($this->session->userdata('gallery')))?$this->session->userdata('gallery')['status']:null;?>
                <div class="col-md-3">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
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
                        <a href="<?=admin_url('add-gallery')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Media Type <a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/file_type/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/file_type/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Type <a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/type/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/type/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Media File</th>
                                    <th scope="col">Preference Order <a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/sequence/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/sequence/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On <a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('gallery/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($gallery)) { $sno = 1; foreach($gallery as $value){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$value['file_type'];?></td>
                                    <td><?=$value['type'];?></td>
                                    <td><?=(empty($value['media_name']))?$value['media_video']:$value['media_name'];?></td>
                                    <td><?=$value['sequence'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus" value="<?php echo $value['id'];?>" <?php echo ($value['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$value['created_by'];?></td>
                                    <td><?=$value['created_on'];?></td>
                                    <td>
                                        <a href="<?=admin_url('edit-gallery/'.$value['id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?=$value['id'];?>"><span class="mdi mdi-delete"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-primary view_detail" data-id="<?=$value['id'];?>" data-toggle="modal" data-target="#galleryDetail"><span class="mdi mdi-eye"></span></a>
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

<!-- Show gallery details modal -->
<div class="modal fade" id="galleryDetail" tabindex="-1" role="dialog" aria-labelledby="galleryDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryDetailLabel">Gallery Details</h5>
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