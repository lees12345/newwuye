<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/home/wwwroot/only.1yuaninfo.com/./application/wxadmint1/view/news/add.html";i:1638930704;s:71:"/home/wwwroot/only.1yuaninfo.com/application/wxadmint1/view/layout.html";i:1637143029;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>首页 - 后台管理模板 Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="/public/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/public/static/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/public/static/admin/assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/chosen.css" />
		<!--<link rel="stylesheet" href="/public/static/admin/assets/css/datepicker.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/colorpicker.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/datepicker.css" />

		<link rel="stylesheet" href="/public/static/admin/assets/css/bootstrap-datetimepicker.min.css" />
-->
	

<link rel="stylesheet" type="text/css" href="/public/static/admin/css/mbox.css"/>  <!--背景样式 弹框样式-->
<script type="text/javascript" src="/public/static/admin/js/jquery-1.10.2.min.js" ></script><!--jquery库-->
<script type="text/javascript" src="/public/static/admin/js/jm-qi.js" ></script><!--自定义弹框大小，提示信息，样式，icon。。。。-->


		<!-- fonts -->

		<link rel="stylesheet" href="/public/static/admin/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="/public/static/admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/public/static/admin/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/public/static/admin/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/public/static/admin/assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/public/static/admin/assets/js/html5shiv.js"></script>
		<script src="/public/static/admin/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							只推一支股
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

					<li class="grey">
							<a class="dropdown-toggle" href="<?php echo url('phones/index'); ?>">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">验证码列表</span>
							</a>

							
						</li>
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/xinfo/index'); ?>">
										<div class="clearfix">
											<span class="pull-left">信息INFO</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="progress-bar "></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:15%" class="progress-bar progress-bar-warning"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="/public/static/admin/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/public/static/admin/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/public/static/admin/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="inbox.html">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/public/static/admin/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo \think\Session::get('admin_name'); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo url('wxadmint1/login/loginout'); ?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>


		<!-- basic scripts -->

<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li>
							<a href="<?php echo url('wxadmint1/index/index'); ?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 后台首页 </span>
							</a>
						</li>
						<?php if($group['group_id'] != 58): ?>
						<!--<li>-->
							<!--<a href="<?php echo url('wxadmint1/select/index'); ?>">-->
								<!--<i class="icon-dashboard"></i>-->
								<!--<span class="menu-text"> 操作记录 </span>-->
							<!--</a>-->
						<!--</li>-->
						<!--<li>-->
							<!--<a href="<?php echo url('wxadmint1/complete/index'); ?>">-->
								<!--<i class="icon-dashboard"></i>-->
								<!--<span class="menu-text"> 客服推送记录 </span>-->
							<!--</a>-->
						<!--</li>-->
						<li>
							<a href="<?php echo url('resource/add'); ?>">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 导入管理 </span>
							</a>
						</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo url('wxadmint1/users/index'); ?>">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 用户管理 </span>
							</a>
						</li>
						<?php if($group['group_id'] != 58): ?>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 申请管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/apply/index'); ?>">
										<i class="icon-double-angle-right"></i>
										已审核
									</a>
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/apply/now'); ?>">
										<i class="icon-double-angle-right"></i>
										未审核
									</a>
								</li>
							</ul>
						</li>
						<?php endif; ?>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 快讯管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<?php if($group['group_id'] != 58): ?>
								<li>
									<a href="<?php echo url('wxadmint1/news/flash_add'); ?>">
										<i class="icon-double-angle-right"></i>
										生成快讯
									</a>
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/news/flash_index'); ?>">
										<i class="icon-double-angle-right"></i>
										快讯列表
									</a>
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/news/add'); ?>">
										<i class="icon-double-angle-right"></i>
										上传消息
									</a>
								</li>
								<?php endif; ?>
								<li>
									<a href="<?php echo url('wxadmint1/news/index'); ?>">
										<i class="icon-double-angle-right"></i>
										消息列表
									</a>
								</li>
								<!--<?php if($group['group_id'] != 58): ?>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/news/send_customer'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--客服群发-->
									<!--</a>-->
								<!--</li>-->
								<!--<?php endif; ?>-->
							</ul>
						</li>
						<li>
							<a href="<?php echo url('wxadmint1/share/index'); ?>">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 查看股票列表 </span>
							</a>
						</li>
						<?php if($group['group_id'] != 58): ?>
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 课程管理 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->
							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/classes/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--添加课程信息-->
									<!--</a>-->
								<!--</li>-->

								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/classes/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--课程列表-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 标的股管理 </span>-->

								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->

							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/pool/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--添加信息-->
									<!--</a>-->
								<!--</li>-->

								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/pool/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--信息列表-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<?php endif; ?>
                        <!--股票-->
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 推送股票管理 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->

							<!--<ul class="submenu">-->
								<!--<?php if($group['group_id'] != 58): ?>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/share/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--股票分享-->
									<!--</a>-->
								<!--</li>-->
								<!--<?php endif; ?>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/share/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--分享记录-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<!--end-->
						<?php if($group['group_id'] != 58): ?>
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 平台活动管理 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->
							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/simula/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--添加活动-->
									<!--</a>-->
								<!--</li>-->

								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/simula/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--活动列表-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/price/learn'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--新人福利预约列表-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/price/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--新人福利领取列表-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/price/price_index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--新人福利列表-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<!--&lt;!&ndash;报告&ndash;&gt;-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 预约管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/learn/add'); ?>">
										<i class="icon-double-angle-right"></i>
										添加预约日期
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/learn/index'); ?>">
										<i class="icon-double-angle-right"></i>
										预约记录
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 订单管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li>
									<a href="<?php echo url('wxadmint1/order/index'); ?>">
										<i class="icon-double-angle-right"></i>
										订单列表
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 报告管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/report/add'); ?>">
										<i class="icon-double-angle-right"></i>
										添加报告
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/report/index'); ?>">
										<i class="icon-double-angle-right"></i>
										报告记录
									</a>
								</li>
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/report/day_add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--生成日报-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/report/day_index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--日报记录-->
									<!--</a>-->
								<!--</li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 用户反馈管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/refund/index'); ?>">
										<i class="icon-double-angle-right"></i>
										用户反馈列表
									</a>
								</li>

								<!--<li>
                                    <a href="<?php echo url('wxadmint1/refund/index_ok'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        已处理
                                    </a>
                                </li>-->
							</ul>
						</li>
						<!--end-->
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 竞猜问题管理 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->
							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/competition/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--添加竞猜-->
									<!--</a>-->
								<!--</li>-->

								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/competition/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--竞猜列表-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/competition/lists'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--答题记录-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<!--end-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 统计管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">


								<li>
									<a href="<?php echo url('wxadmint1/stastics/index'); ?>">
										<i class="icon-double-angle-right"></i>
										推广统计
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/stastics/newIndex'); ?>">
										<i class="icon-double-angle-right"></i>
										新推广统计
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 指数管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/profit/add'); ?>">
										<i class="icon-double-angle-right"></i>
										添加上证指数
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/profit/index'); ?>">
										<i class="icon-double-angle-right"></i>
										上证指数列表
									</a>
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/profit/lists'); ?>">
										<i class="icon-double-angle-right"></i>
										收益率
									</a>
								</li>
							</ul>
						</li>
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 问卷调查 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->

							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/survey/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--添加-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/survey/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--列表-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<!--<li>-->
							<!--<a href="#" class="dropdown-toggle">-->
								<!--<i class="icon-desktop"></i>-->
								<!--<span class="menu-text"> 活动管理 </span>-->
								<!--<b class="arrow icon-angle-down"></b>-->
							<!--</a>-->

							<!--<ul class="submenu">-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/activity/add'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--活动添加-->
									<!--</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('wxadmint1/activity/index'); ?>">-->
										<!--<i class="icon-double-angle-right"></i>-->
										<!--活动列表-->
									<!--</a>-->
								<!--</li>-->
							<!--</ul>-->
						<!--</li>-->
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="menu-text"> 系统设置 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('wxadmint1/admin/admin_index'); ?>">
										<i class="icon-double-angle-right"></i>
										管理员列表
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/admin_add'); ?>">
										<i class="icon-double-angle-right"></i>
										管理员添加
									</a>
								</li>

								<li>
									<a href="<?php echo url('wxadmint1/admin/rule_index'); ?>">
										<i class="icon-double-angle-right"></i>
										用户组
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/rule_add'); ?>">
										<i class="icon-double-angle-right"></i>
										用户组添加
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/auth_index'); ?>">
										<i class="icon-double-angle-right"></i>
										权限菜单
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/addCustomerService'); ?>">
										<i class="icon-double-angle-right"></i>
										添加客服
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/ListCustomerService'); ?>">
										<i class="icon-double-angle-right"></i>
										客服列表
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/addMessage'); ?>">
										<i class="icon-double-angle-right"></i>
										信息添加
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/listMessage'); ?>">
										<i class="icon-double-angle-right"></i>
										信息列表
									</a>
								</li>
								<li>
									<a href="<?php echo url('wxadmint1/admin/getMaterialList'); ?>">
										<i class="icon-double-angle-right"></i>
										素材列表
									</a>
								</li>
							</ul>
						</li>
						<?php endif; ?>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

					
				

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
</div><!-- /.main-container -->

		
<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li>
								<a href="#">消息</a>
							</li>
							<li class="active">消息添加</li>
						</ul><!-- .breadcrumb -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>
					<div class="page-content">
						<div class="page-header">
							<h1>
								消息
								<small>
									<i class="icon-double-angle-right"></i>
									消息添加
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo url('wxadmint1/news/insert'); ?>" method="post">
								<?php echo token('__hash__'); ?>
									<input name="name" type="hidden" value="only">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类型 </label>
											<div class="col-sm-9">
												<select id="bi" name="mt_name" class="col-xs-10 col-sm-5">
													<option value="">请选择类型</option>
													<!--<option value="早餐">早餐</option>-->
													<!--<option value="夜宵">夜宵</option>-->
													<option value="推荐前提醒">推荐前提醒</option>
													<option value="体验股发布">体验股发布</option>
													<option value="通知">通知</option>
													<option value="收盘总结">收盘总结</option>
													<option value="早评">早评</option>
													<option value="午评">午评</option>
													<option value="收评">收评</option>
													<option value="服务回顾">服务回顾</option>
													<option value="上午分享">上午分享</option>
													<option value="下午分享">下午分享</option>
													<option value="跨周金股">跨周金股</option>
													<option value="收官股">收官股</option>
													<option value="跟踪提示">跟踪提示</option>
													<option value="止盈提示">止盈提示</option>
													<option value="止损提示">止损提示</option>
													<option value="调出提示">调出提示</option>
													<option value="工作总结">工作总结</option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题 </label>
										<div class="col-sm-9">
											<input type="text" name="title">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 产品 </label>
										<div class="col-sm-9">
											<input type="text" name="product_name" value="稳健型">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 股票代码 </label>
										<div class="col-sm-9">
											<input type="text" name="news_code">
										</div>
									</div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 快讯标题 </label>
                                        <div class="col-sm-9">
                                            <select id="bi" name="kx_id" class="col-xs-10 col-sm-5">
                                            <option value="">请快讯标题</option>
                                            <?php if(is_array($kx) || $kx instanceof \think\Collection || $kx instanceof \think\Paginator): $i = 0; $__LIST__ = $kx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kx): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $kx['kx_id']; ?>"><?php echo $kx['kx_title']; endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
									<div class="space-4"></div>
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">摘要 </label>

										<div class="col-sm-9">
										<textarea id="zhai" name="news_adstracts" rows="5" cols="50" id="form-field-2" class="col-xs-10 col-sm-5"></textarea>
										</div>
									</div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">是否股票 </label>
                                        <div class="col-sm-9" style="line-height:32px">
											<input id="lian" type="radio" name="is_shares" value='0' checked>否
											<input id="lian" type="radio" name="is_shares" value='1'>是
                                        </div>
                                    </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">推送客户类型 </label>
                                             <div class="col-sm-9" style="line-height:32px">
                                            <?php if(is_array($utype) || $utype instanceof \think\Collection || $utype instanceof \think\Paginator): $i = 0; $__LIST__ = $utype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$utype): $mod = ($i % 2 );++$i;?>
                                                 <input type="checkbox" name="user_type[]" value='<?php echo $utype['type_id']; ?>'><?php echo $utype['type_name']; endforeach; endif; else: echo "" ;endif; ?>
												 <input type="checkbox" id="cb1" onclick="checkAll()"/>全选/取消
                                             </div>
                                          </div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 预约客户 </label>

										<div class="col-sm-9">
											<select id="learn" name="learn_id" class="col-xs-10 col-sm-5">
												<option value="">请选择预约客户</option>
												<?php if(is_array($learn) || $learn instanceof \think\Collection || $learn instanceof \think\Paginator): $i = 0; $__LIST__ = $learn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$learn): $mod = ($i % 2 );++$i;?>

												<option value="<?php echo $learn['learn_id']; ?>"><?php echo $learn['learn_title']; ?>&#45;&#45;<?php if($learn['learn_type'] == 1): ?>激进型<?php else: ?>稳健型<?php endif; endforeach; endif; else: echo "" ;endif; ?>
											</select>
										</div>
									</div>
									<!--<div class="form-group">-->
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 活动客户 </label>-->

										<!--<div class="col-sm-9">-->
											<!--<select id="learn" name="activity_id" class="col-xs-10 col-sm-5">-->
												<!--<option value="">请选择活动客户</option>-->
												<!--<?php if(is_array($activity) || $activity instanceof \think\Collection || $activity instanceof \think\Paginator): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$activity): $mod = ($i % 2 );++$i;?>-->

												<!--<option value="<?php echo $activity['id']; ?>"><?php echo $activity['activity_title']; ?>-->
													<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
											<!--</select>-->
										<!--</div>-->
									<!--</div>-->


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">是否有链接 </label>
										<div class="col-sm-9" style="line-height:32px">
											<input id="lian" type="radio" name="is_url" value='0'>否
											<input id="lian" type="radio" name="is_url" value='1' checked>是
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">是否免费 </label>
										<div class="col-sm-9" style="line-height:32px">
											<input id="lian" type="radio" name="is_free" value='0' >否
											<input id="lian" type="radio" name="is_free" value='1' checked>是
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 详情页链接 </label>
										<div class="col-sm-9">
											<input type="text" name="link_url" value="">
										</div>
									</div>
									<!--<div class="form-group">-->
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-2">简介 </label>-->
										<!--<div class="col-sm-9">-->
											<!--<textarea placeholder="请输入内容" id="containers" name="news_desc" type="text/plain" style="width:600px;height:200px;"></textarea>-->
										<!--</div>-->
									<!--</div>-->

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">详情页内容 </label>
										<div class="col-sm-9">
										<textarea placeholder="请输入内容" id="container" name="new_content" type="text/plain" style="width:600px;height:200px;"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">服务类型颜色 </label>
										<div class="col-sm-9" style="line-height:32px">
											<input id="lian" type="radio" name="mt_color" value='1' checked>红
											<input id="lian" type="radio" name="mt_color" value='2' >蓝
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 限制时间 </label>
										<div class="col-sm-9">
											<input type="text" name="limit_end_time" placeholder="例：2021-07-22 15:55:00">
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" value='提交' class="btn btn-info">
										</div>
									</div>		
									</form>
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
<script type="text/javascript" src="/public/static/admin//ueditor/ueditor.config.js"></script>
  <!-- 编辑器源码文件 -->
  <script type="text/javascript" src="/public/static/admin//ueditor/ueditor.all.js"></script>
  <!-- 实例化编辑器 -->
  <script type="text/javascript">

	  function checkAll(){
		  var cb = document.getElementById("cb1");
		  if(cb.checked==true){
			  var checkbox1 = document.getElementsByName("user_type[]");
			  for(var i=0;i<checkbox1.length;i++){
				  checkbox1[i].checked=true;
			  }
		  }else{
			  var checkbox1 = document.getElementsByName("user_type[]");
			  for(var i=0;i<checkbox1.length;i++){
				  checkbox1[i].checked=false;
			  }
		  }
	  }


    var ue = UE.getEditor('container', {
      toolbars: [
    [
        'anchor', //锚点
        'undo', //撤销
        'redo', //重做
        'bold', //加粗
        'indent', //首行缩进
        'snapscreen', //截图
        'italic', //斜体
        'underline', //下划线
        'strikethrough', //删除线
        'subscript', //下标
        'fontborder', //字符边框
        'superscript', //上标
        'formatmatch', //格式刷
        'source', //源代码
        'blockquote', //引用
        'pasteplain', //纯文本粘贴模式
        'selectall', //全选
        'print', //打印
        'preview', //预览
        'horizontal', //分隔线
        'removeformat', //清除格式
        'time', //时间
        'date', //日期
        'unlink', //取消链接
        'insertrow', //前插入行
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'deletecaption', //删除表格标题
        'inserttitle', //插入标题
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'cleardoc', //清空文档
        'insertparagraphbeforetable', //"表格前插入行"
        'insertcode', //代码语言
        'fontfamily', //字体
        'fontsize', //字号
        'paragraph', //段落格式
        'simpleupload', //单图上传
        'insertimage', //多图上传
        'edittable', //表格属性
        'edittd', //单元格属性
        'link', //超链接
        'emotion', //表情
        'spechars', //特殊字符
        'searchreplace', //查询替换
        'map', //Baidu地图
        'gmap', //Google地图
        'insertvideo', //视频
        'help', //帮助
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'forecolor', //字体颜色
        'backcolor', //背景色
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表
        'fullscreen', //全屏
        'directionalityltr', //从左向右输入
        'directionalityrtl', //从右向左输入
        'rowspacingtop', //段前距
        'rowspacingbottom', //段后距
        'pagebreak', //分页
        'insertframe', //插入Iframe
        'imagenone', //默认
        'imageleft', //左浮动
        'imageright', //右浮动
        'attachment', //附件
        'imagecenter', //居中
        'wordimage', //图片转存
        'lineheight', //行间距
        'edittip ', //编辑提示
        'customstyle', //自定义标题
        'autotypeset', //自动排版
        'webapp', //百度应用
        'touppercase', //字母大写
        'tolowercase', //字母小写
        'background', //背景
        'template', //模板
        'scrawl', //涂鸦
        'music', //音乐
        'inserttable', //插入表格
        'drafts', // 从草稿箱加载
        'charts', // 图表
       
    ]
],  
    autoHeight: false,
    initialFrameWidth :800,//设置编辑器宽度
initialFrameHeight:250,//设置编辑器高度
scaleEnabled:true//设置不自动调整高度
//scaleEnabled {Boolean} [默认值：false]//是否可以拉伸长高，(设置true开启时，自动长高失效)
});

  function check(){
      var lei=""
      $('input[name="utype[]"]:checked').each(function(){
          lei+=$(this).val()+',';
      }); ;
      var learn = $("#learn option:selected").val();
    // alert(nei);


      console.log(lei);
      console.log(learn);

      $.ajax({
          type: "POST",
          url: "yulan.html",
          data: {lei:lei,learn:learn},
          dataType: "json",
          success: function(data){
              alert(data);
          }
      });
  }

   
    
  </script>
					
		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/public/static/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/public/static/admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/public/static/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/public/static/admin/assets/js/bootstrap.min.js"></script>
		<script src="/public/static/admin/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/public/static/admin/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/public/static/admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.sparkline.min.js"></script>
		<script src="/public/static/admin/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/public/static/admin/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/public/static/admin/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<!-- 时间js -->
		<!--<script src="/public/static/admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/bootstrap.min.js"></script>
		&lt;!&ndash;<script src="/public/static/admin/assets/js/date-time/bootstrap-datetimepicker.fr.js"></script>&ndash;&gt;
		<script src="/public/static/admin/assets/js/date-time/bootstrap-datetimepicker.js"></script>

		<script src="/public/static/admin/assets/js/date-time/moment.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/daterangepicker.min.js"></script>
		<script src="/public/static/admin/assets/js/chosen.jquery.min.js"></script>
		<script src="/public/static/admin/assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/moment.min.js"></script>
		<script src="/public/static/admin/assets/js/date-time/daterangepicker.min.js"></script>-->
		<script src="/public/static/admin/assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.knob.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.autosize.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="/public/static/admin/assets/js/jquery.maskedinput.min.js"></script>
		<script src="/public/static/admin/assets/js/bootstrap-tag.min.js"></script>


		<script src="/public/static/admin/assets/js/ace-elements.min.js"></script>
		<script src="/public/static/admin/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) 
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
	</body>
</html>
