<script src="<?=base_url('assets/js/admin/users.js')?>"></script>
<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Users List</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="<?=admin_url()?>">
                            <span class="mdi mdi-home"></span> 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Users
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
                    <input type="text" value="<?=$this->session->userdata('user')['user_name'];?>" name="user_name" placeholder="Search By Name" class="form-control form-control-sm">
                </div>

                <div class="col-md-3 mb-3">
                    <input type="text" value="<?=$this->session->userdata('user')['user_email'];?>" name="user_email" placeholder="Search By Email" class="form-control form-control-sm">
                </div>
                
                <?php $status = (!empty($this->session->userdata('user')))?$this->session->userdata('user')['status']:null;?>
                <div class="col-md-3 mb-3">
                    <select name="status" class="form-control form-control-sm">
                        <option selected disabled>Select Status</option>
                        <option value="0" <?php if($status == "0"){ echo "selected";}?>>Active</option>
                        <option value="1" <?php if($status == "1"){ echo "selected";}?>>Inactive</option>
                    </select>
                </div>

                <?php $user_type = (!empty($this->session->userdata('user')))?$this->session->userdata('user')['user_type']:null;?>
                <div class="col-md-3 mb-3">
                    <select name="user_type" class="form-control form-control-sm">
                        <option selected disabled>Select User Type</option>
                        <option value="0" <?php if($user_type == "0"){ echo "selected";}?>>Admin</option>
                        <option value="1" <?php if($user_type == "1"){ echo "selected";}?>>Editor</option>
                        <option value="2" <?php if($user_type == "2"){ echo "selected";}?>>Sales Executive</option>
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
                        <?php if($this->session->userdata('admin_details')['user_type'] == "0"){?>
                        <a href="<?=admin_url('add-users')?>" class="btn btn-primary">Add</a>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Type <a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/user_type/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/user_type/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Name <a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/name/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/name/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Email <a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/email/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/email/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created On <a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/created_on/asc')?>"><span class="mdi mdi-arrow-up"></span></a><a href="<?php echo admin_url('users/'.$this->pagination->current_place().'/created_on/desc')?>"><span class="mdi mdi-arrow-down"></span></a></th>
                                    <?php if($this->session->userdata('admin_details')['user_type'] == "0"){?>
                                    <th scope="col">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($users)) { $sno = 1 + $_SESSION['page']; foreach($users as $user){?>
                                <tr>
                                    <td scope="row"><?=$sno; $sno++;?></td>
                                    <td><?=$user['user_type'];?></td>
                                    <td><?=$user['name'];?></td>
                                    <td><?=$user['email'];?></td>
                                    <td align="center">
                                        <label class="switch">
                                          <input type="checkbox" class="chkstatus" value="<?php echo $user['admin_id'];?>" <?php echo ($user['status']=="0")?'checked':'' ?>>
                                          <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td><?=$user['created_by'];?></td>
                                    <td><?=$user['created_on'];?></td>
                                    <?php if($this->session->userdata('admin_details')['user_type'] == "0"){?>
                                    <td>
                                        <a href="<?=admin_url('edit-users/'.$user['admin_id'])?>" class="btn btn-primary"><span class="mdi mdi-pencil"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-id="<?=$user['admin_id'];?>"><span class="mdi mdi-delete"></span></a>
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