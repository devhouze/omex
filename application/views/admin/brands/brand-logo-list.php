<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Brands Logo List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Brands Logo
                    </li>
                </ol>
            </nav>

        </div>

        <div class="row">            
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-brands-logo')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand Logo</th>
                                    <th scope="col">Alt Comment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($brand_logos)) { $sno = 1; foreach($brand_logos as $logo){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$logo['name'];?></td>
                                    <td><img src="<?=base_url('assets/images/admin/brand-logo/'.$logo['brand_logo']);?>" alt="" style="width:50px; height:50px"></td>
                                    <td><?=$logo['alt_comment'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus_logo" value="<?php echo $logo['id'];?>" <?php echo ($logo['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$logo['created_by'];?></td>
                                    <td><?=$logo['created_on'];?></td>
                                    <td>
                                    <a href="<?php echo admin_url('edit-brands-logo/'.$logo['id']);?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                    <a href="javascript:void(0)" data-id="<?=$logo['id'];?>" class="btn btn-danger delete_logo"><span class="mdi mdi-delete"></span></a>
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