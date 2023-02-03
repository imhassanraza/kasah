<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
	
    <head>
        <meta charset="utf-8" />
        <title> Kasah - Administrator <?php echo isset($title) ? '| '. $title : ''; ?> </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- datepicker -->
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/page-style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/pages/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/admin_style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/colorbox.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
		<link rel="shortcut icon" href="favicon.ico" /> 
		<!-- ck editor -->
		<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
		
		<!-- datatable -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.css" /><!-- 
		<link rel="stylesheet" href="global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" /> -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
		<!-- END HEAD -->

	</head>
	
	
	
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url() ?>admin">
					   <img src="<?php echo base_url() ?>assets/img/logo.png" width="130px">
					</a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
					</div>
				</div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
				</a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                       <!-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
							</a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
									<span class="bold">12 pending</span> notifications</h3>
                                    <a href="page_user_profile_1.html">view all</a>
								</li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
													</span> New user registered. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
													</span> Server #12 overloaded. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
													</span> Server #2 not responding. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
													</span> Application error. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
													</span> Database overloaded 68%. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
													</span> A user IP blocked. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
													</span> Storage Server #4 not responding dfdfdfd. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
													</span> System Error. </span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
													</span> Storage server failed. </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						-->
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                      <!--  <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
							</a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
									<span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
								</li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
												<img src="<?php echo base_url();?>assets/layouts/layout/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
												</span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
												<img src="<?php echo base_url();?>assets/layouts/layout/img/avatar7.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
												</span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
												<img src="<?php echo base_url();?>assets/layouts/layout/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
												</span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
												<img src="<?php echo base_url();?>assets/layouts/layout/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
												</span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
											</a>
										</li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
												<img src="<?php echo base_url();?>assets/layouts/layout/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
												</span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						-->
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                       <!-- <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 3 </span>
							</a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
									<span class="bold">12 pending</span> tasks</h3>
                                    <a href="app_todo.html">view all</a>
								</li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
												</span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
													</span>
												</span>
											</a>
										</li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
												</span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						-->
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php
                                $admins = $this->session->userdata('admins');
                                $avatar = getAll('admins', 'username', $admins['username']);
                                $avatar = $avatar[0];
                                if (empty($avatar['avatar'])) {
                                    ?>
                                    <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/img/dummy.jpg" />
                                <?php } else { ?>
                                    <img alt="" class="img-circle" src="<?php echo base_url(); ?>uploads/admin/<?php echo $avatar['avatar']; ?>" />
                                <?php } ?>
                                <span class="username username-hide-on-mobile"> <?php echo $admins['username'] ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url() . 'admin/profile'; ?>">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'admin/logout'; ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        
					</ul>
				</div>
                <!-- END TOP NAVIGATION MENU -->
			</div>
            <!-- END HEADER INNER -->
		</div>
	<!-- END HEADER -->	