<style>
.card-top .form-control-sm
{
height: 44px;
}
</style>
<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Brands Offer Overview</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Brands Offer
                    </li>
                </ol>
            </nav>

        </div>

        <div class="row">     
            <div class="col-lg-12">
                <div class="card card-default card-top">
                <div class="card-body">
                <form action="" method="post">
                <div class="form-row">
                <div class="col-4">
                    <input type="text" value="<?=$this->session->userdata('brand_offer')['brand_name'];?>" name="brand_name" placeholder="Search By Brand Name" class="form-control form-control-sm">
                </div>

                <div class="col">
                    <input type="text" value="<?=$this->session->userdata('brand_offer')['offer_name'];?>" name="offer_name" placeholder="Search By Offer Name" class="form-control form-control-sm">
                </div>
                
                <?php $status = (!empty($this->session->userdata('brand_offer')))?$this->session->userdata('brand_offer')['status']:null;?>
                <div class="col">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
                    </select>
                </div>

                <div class="col d-flex justify-content-end">
                    <input type="submit" name="search" class="btn btn-primary " value="Search">
                    <input type="submit" name="reset" class="btn btn-danger ml-4" value="Reset">
                </div>
                
                </form>
                </div>
                </div>
                </div>
            </div>       
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-brands-offer')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name <a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/brand_name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/brand_name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Brand Offer Name <a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/offer_name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/offer_name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Brand Offer Logo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On <a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('brand-offer/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($brands_offer)) { $sno = 1 + $_SESSION['page']; foreach($brands_offer as $value){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$value['brand_name'];?></td>
                                    <td><?=$value['offer_name'];?></td>
                                    <td><img src="<?=base_url('assets/images/public/brand/'.$value['offer_thumbnail']);?>" alt="" style="width:50px; height:50px"></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="activate_offer" value="<?php echo $value['offer_id'];?>" <?php echo ($value['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$value['created_by'];?></td>
                                     <td><?=date('d M Y',strtotime($value['created_on']));?></td>
                                    <td>
                                    <a href="<?php echo admin_url('edit-brand-offer/'.$value['offer_id']);?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                    <a href="javascript:void(0)" data-id="<?=$value['offer_id'];?>" class="btn btn-danger delete_offer"><span class="mdi mdi-delete"></span></a>
                                    <a href="javascript:void(0)" class="btn btn-primary offer_detail" data-id="<?=$value['offer_id'];?>" data-toggle="modal" data-target="#offerDetail"><span class="mdi mdi-eye"></span></a>
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
<div class="modal fade" id="offerDetail" tabindex="-1" role="dialog" aria-labelledby="offerDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="offerDetailLabel">Brand Offer Details</h5>
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