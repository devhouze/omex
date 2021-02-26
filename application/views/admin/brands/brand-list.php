<script src="<?=base_url('assets/js/admin/brands.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Brands List</h1>

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
                    <div class="card-header card-header-border-bottom">
                        <a href="<?=admin_url('add-brands')?>" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
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
                                    <td><?=$brand['created_by'];?></td>
                                    <td><?=$brand['created_on'];?></td>
                                    <td>
                                    <a href="<?php echo admin_url('edit-brands/'.$brand['brand_id']);?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                    <a href="javascript:void(0)" data-id="<?=$brand['brand_id'];?>" class="btn btn-danger delete"><span class="mdi mdi-delete"></span></a>
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