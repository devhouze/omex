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
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-banners')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Banner Type</th>
                                    <th scope="col">Banner Web</th>
                                    <th scope="col">Banner Mobile</th>
                                    <th scope="col">Alt Comment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($banners)) { $sno = 1; foreach($banners as $banner){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$banner['banner_type'];?></td>
                                    <td><img src="<?=base_url('assets/images/admin/banner/'.$banner['banner_web']);?>" alt="" style="width:50px; heigth:50px"></td>
                                    <td><img src="<?=base_url('assets/images/admin/banner/'.$banner['banner_mobile'])?>" alt="" style="width:50px; heigth:50px"></td>
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