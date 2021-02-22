<aside class="left-sidebar bg-sidebar">
      <div id="sidebar" class="sidebar sidebar-without-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="/index.html" title="Sleek Dashboard">
            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
              <g fill="none" fill-rule="evenodd">
                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
              </g>
            </svg>
            <span class="brand-name text-truncate">Omaxe World</span>
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">

            <li class="has-sub active expand">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Dashboard</span> <b class="caret"></b>
              </a>
              <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li class="active">
                    <a class="sidenav-item-link" href="index.html">
                      <span class="nav-text">Ecommerce</span>
                    </a>
                  </li>

                  <li>
                    <a class="sidenav-item-link" href="analytics.html">
                      <span class="nav-text">Analytics</span>
                      <span class="badge badge-success">new</span>
                    </a>
                  </li>

                </div>
              </ul>
            </li>

            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#brand" aria-expanded="false" aria-controls="brand">
                <i class="mdi mdi-pencil-box-multiple"></i>
                <span class="nav-text">Brand</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="brand" data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li>
                    <a class="sidenav-item-link" href="<?php echo admin_url('brands')?>">
                      <span class="nav-text">Brand List</span>
                    </a>
                  </li>

                </div>
              </ul>
            </li>

            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#leads" aria-expanded="false" aria-controls="leads">
                <i class="mdi mdi-pencil-box-multiple"></i>
                <span class="nav-text">Leads</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="leads" data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li>
                    <a class="sidenav-item-link" href="<?php echo admin_url('leads')?>">
                      <span class="nav-text">Lead List</span>
                    </a>
                  </li>

                </div>
              </ul>
            </li>

            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#leads" aria-expanded="false" aria-controls="leads">
                <i class="mdi mdi-pencil-box-multiple"></i>
                <span class="nav-text">Events</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="leads" data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li>
                    <a class="sidenav-item-link" href="<?php echo admin_url('events')?>">
                      <span class="nav-text">Event List</span>
                    </a>
                  </li>

                </div>
              </ul>
            </li>

            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#setting" aria-expanded="false" aria-controls="setting">
                <i class="mdi mdi-folder-multiple-outline"></i>
                <span class="nav-text">Setting</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="setting" data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li>
                    <a class="sidenav-item-link" href="<?=admin_url('profile');?>">
                      <span class="nav-text">Profile</span>
                    </a>
                  </li>

                  <li>
                    <a class="sidenav-item-link" href="<?=admin_url('change-password');?>">
                      <span class="nav-text">Change Password</span>
                    </a>
                  </li>

                  <li>
                    <a class="sidenav-item-link" href="<?=admin_url('users');?>">
                      <span class="nav-text">Users</span>
                    </a>
                  </li>

                </div>
              </ul>
            </li>
            
          </ul>

        </div>
      </div>
    </aside>

    <!-- Header -->
    <header class="main-header " id="header">
        <nav class="navbar navbar-static-top navbar-expand-lg">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <!-- search form -->
          <div class="search-form d-none d-lg-inline-block">
            <div class="input-group">
              <button type="button" name="search" id="search-btn" class="btn btn-flat">
                <i class="mdi mdi-magnify"></i>
              </button>
              <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
              <ul id="search-results"></ul>
            </div>
          </div>

          <div class="navbar-right ">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <button class="dropdown-toggle" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">You have 5 notifications</li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-plus"></i> New user registered
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-remove"></i> User deleted
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-supervisor"></i> New client
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-server-network-off"></i> Server overloaded
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                    </a>
                  </li>
                  <li class="dropdown-footer">
                    <a class="text-center" href="#"> View All </a>
                  </li>
                </ul>
              </li>
              
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <img src="<?php echo BASE_URL(); ?>assets/images/admin/user.png" class="user-image" alt="User Image" />
                  <span class="d-none d-lg-inline-block">Abdus Salam</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <!-- User image -->
                  <li class="dropdown-header">
                    <img src="<?php echo BASE_URL(); ?>assets/images/admin/user.png" class="img-circle" alt="User Image" />
                    <div class="d-inline-block">
                      Abdus Salam <small class="pt-1">iamabdus@gmail.com</small>
                    </div>
                  </li>

                  <li>
                    <a href="user-profile.html">
                      <i class="mdi mdi-account"></i> My Profile
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-email"></i> Message
                    </a>
                  </li>
                  <li>
                    <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                  </li>
                  <li class="right-sidebar-in">
                    <a href="javascript:0"> <i class="mdi mdi-settings"></i> Setting </a>
                  </li>

                  <li class="dropdown-footer">
                    <a href="<?php echo base_url('admin/logout');?>"> <i class="mdi mdi-logout"></i> Log Out </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>      
      </header>