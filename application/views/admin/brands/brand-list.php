<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Brands Overview</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Brands
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
                        <input type="text" value="<?=$this->session->userdata('brand')['brand_name'];?>" name="name" placeholder="Search By Name" class="form-control form-control-sm">
                </div>
                
                <?php $status = (!empty($this->session->userdata('brand')))?$this->session->userdata('brand')['status']:null;?>
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
                        <a href="<?=admin_url('add-brands')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Logo</th>
                                    <th scope="col">Brand Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($brands)) { $sno = 1; foreach($brands as $brand){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$brand['brand_name'];?></td>
                                    <td><img src="<?=base_url('assets/images/public/brand/'.$brand['brand_logo']);?>" alt="" style="width:50px; height:50px"></td>
                                    <td><?=$brand['brand_location'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus" value="<?php echo $brand['brand_id'];?>" <?php echo ($brand['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$brand['created_by'];?></td>
                                    <td><?=$brand['created_on'];?></td>
                                    <td>
                                    <a href="<?php echo admin_url('edit-brands/'.$brand['brand_id']);?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                    <a href="javascript:void(0)" data-id="<?=$brand['brand_id'];?>" class="btn btn-danger delete"><span class="mdi mdi-delete"></span></a>
                                    <a href="javascript:void(0)" class="btn btn-primary view_detail" data-id="<?=$brand['brand_id'];?>" data-toggle="modal" data-target="#brandDetail"><span class="mdi mdi-eye"></span></a>
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

<!-- Show brand details modal -->
<div class="modal fade" id="brandDetail" tabindex="-1" role="dialog" aria-labelledby="brandDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="brandDetailLabel">Brand Details</h5>
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