<script src="<?=base_url('assets/js/admin/banner.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Banners List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Banners
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

                <?php $status = (!empty($this->session->userdata('banner')))?$this->session->userdata('banner')['status']:null;?>
                <div class="col-md-3">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
                    </select>
                </div>
                
                <?php $banner_type = (!empty($this->session->userdata('banner')))?$this->session->userdata('banner')['banner_type']:null;?>
                <div class="col-md-3">
                    <select name="banner_type" class="form-control form-control-sm">
                        <option selected disabled>Select Banner Type</option>
                        <option value="1" <?php if($banner_type == "1"){ echo "selected";}?>>Home</option>
                        <option value="2" <?php if($banner_type == "2"){ echo "selected";}?>>Event</option>
                        <option value="3" <?php if($banner_type == "3"){ echo "selected";}?>>Brand Directory</option>
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
                        <a href="<?=admin_url('add-banners')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Banner Type <a href="<?php echo admin_url('banners/'.$this->pagination->current_place().'/banner_type/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('banners/'.$this->pagination->current_place().'/banner_type/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Banner Web</th>
                                    <th scope="col">Banner Mobile</th>
                                    <th scope="col">Alt Tag</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On <a href="<?php echo admin_url('banners/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('banners/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($banners)) { $sno = 1; foreach($banners as $banner){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$banner['banner_type'];?></td>
                                    <?php if($banner['banner_type'] == "Home" || $banner['banner_type'] == "Event"){?>
                                    <td><img src="<?=base_url('assets/images/public/home/'.$banner['banner_web']);?>" alt="" style="width:50px; heigth:50px"></td>
                                    <td><img src="<?=base_url('assets/images/public/home/'.$banner['banner_mobile'])?>" alt="" style="width:50px; heigth:50px"></td>
                                    <?php } else {?>
                                        <td><img src="<?=base_url('assets/images/public/brand/'.$banner['banner_web']);?>" alt="" style="width:50px; heigth:50px"></td>
                                    <td><img src="<?=base_url('assets/images/public/brand/'.$banner['banner_mobile'])?>" alt="" style="width:50px; heigth:50px"></td>
                                    <?php } ?>
                                    <td><?=$banner['comment'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus" value="<?php echo $banner['id'];?>" <?php echo ($banner['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$banner['created_by'];?></td>
                                    <td><?=$banner['created_on'];?></td>
                                    <td>
                                        <a href="<?=admin_url('edit-banners/'.$banner['id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?=$banner['id'];?>"><span class="mdi mdi-delete"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-primary view_banner" data-id="<?=$banner['id'];?>" data-toggle="modal" data-target="#banner_details"><span class="mdi mdi-eye"></span></a>
                                    </td>
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

<!-- Modal to show banner -->
<div class="modal fade" id="banner_details" tabindex="-1" role="dialog" aria-labelledby="banner_detailsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="banner_detailsLabel">Banner Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="bannerDetails"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal to show banner ends here-->