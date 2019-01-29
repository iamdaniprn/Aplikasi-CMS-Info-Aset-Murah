<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center" style="background: #00334d">
            <a href="index.html" class="logo"><i class="md"></i> <span>IAM Management</span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation" style="background: silver">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url('assets/img/admin.png');?>" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('admin/logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>