<div class="left side-menu" style=" background: #004466">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo base_url('assets/img/admin.png');?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: white">Admin <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('admin/logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu" style=" background: #004466;">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('admin');?>" class="waves-effect" style="color: #cccccc"><i class="fa fa-home"></i><span>Dasboard</span></a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin/input_manual');?>" class="waves-effect" style="color: #cccccc"><i class="fa fa-plus-circle"></i><span>Properti Input Manual</span></a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin/verifikator');?>" class="waves-effect" style="color: #cccccc"><i class="fa fa-file-powerpoint-o"></i><span >Properti Verifikator</span></a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin/properti_terjual');?>" class="waves-effect" style="color: #cccccc"><i class="fa fa-shopping-cart"></i><span>Properti Terjual</span></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>