<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/home/wwwroot/only.1yuaninfo.com/./application/wxadmint1/view/stastics/index.html";i:1635479599;s:71:"/home/wwwroot/only.1yuaninfo.com/application/wxadmint1/view/layout.html";i:1635995797;}*/ ?>
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
							只推一只股
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

		<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EchartsAdmin</title>
  <!-- ECharts单文件引入 -->
  <script src="https://cdn.bootcss.com/echarts/4.2.1-rc1/echarts.min.js"></script>
  <!-- 引入 Vue 和 axiox 的 JS 文件 -->
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
  <!-- import Vue before Element -->
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <!-- import JavaScript -->
  <script src="https://unpkg.com/element-ui/lib/index.js"></script>

  <!-- <script src="http://echarts.baidu.com/build/dist/echarts.js"></script> -->
  <style>
    body {
      /* overflow: hidden; */
    }

    .BarBox {
      margin: 10px 20px 20px;
      box-shadow: 0px 0px 8px 2px #e5e5e5;
      position: relative;
    }

    .LineBox {
      margin: 10px 20px;
      box-shadow: 0px 0px 8px 2px #e5e5e5;
      position: relative;
    }

    a,
    a:link,
    a:visited,
    a:hover {
      text-decoration: none;
      color: #656565;
    }

    .flex-h {
      display: -webkit-box;
      /* android 2.1-3.0, ios 3.2-4.3 */
      display: -webkit-flex;
      /* Chrome 21+ */
      display: -ms-flexbox;
      /* WP IE 10 */
      display: flex;
      /* android 4.4 */
    }

    .flex-v {
      display: -webkit-box;
      /* android 2.1-3.0, ios 3.2-4.3 */
      display: -webkit-flex;
      /* Chrome 21+ */
      display: -ms-flexbox;
      /* WP IE 10 */
      display: flex;
      /* android 4.4 */
      -webkit-box-orient: vertical;
      /* android 2.1-3.0, ios 3.2-4.3 */
      -webkit-flex-direction: column;
      /* Chrome 21+ */
      -ms-flex-direction: column;
      /* WP IE 10 */
      flex-direction: column;
      /* android 4.4 */
    }

    .flex-between {
      /*! autoprefixer: off */
      -webkit-box-pack: justify;
      /* android 2.1-3.0, ios 3.2-4.3 */
      -webkit-justify-content: space-between;
      /* Chrome 21+ */
      -ms-flex-pack: justify;
      /* WP IE 10 */
      justify-content: space-between;
    }

    .flex-around {
      /*! autoprefixer: off */
      -webkit-box-pack: justify;
      /* android 2.1-3.0, ios 3.2-4.3 */
      -webkit-justify-content: space-around;
      /* Chrome 21+ */
      -ms-flex-pack: justify;
      /* WP IE 10 */
      justify-content: space-around;
    }

    .flex-evenly {
      /*! autoprefixer: off */
      -webkit-box-pack: justify;
      /* android 2.1-3.0, ios 3.2-4.3 */
      -webkit-justify-content: space-evenly;
      /* Chrome 21+ */
      -ms-flex-pack: justify;
      /* WP IE 10 */
      justify-content: space-evenly;
    }

    .popupDialog {
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99;
    }

    .popupBox {
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, .4);
      position: absolute;
      left: 0;
      top: 0;
      z-index: 9999;
      /* display: flex;
            align-items: center;
            justify-content: center; */
    }

    .wrapper {
      width: 83%;
      max-height: 550px;
      background-color: #fff;
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 999;
      padding: 10px;
      /* overflow-y: auto; */
    }

    .wrapper>div>span {
      /* width: 65px; */
      text-align: center;
    }

    .popup_comtent {
      width: 100%;
      max-height: 463px;
      overflow-y: auto;
    }

    .popup_comtent div:last-child {
      border-bottom: none;
    }

    .popup_comtent_item {
      color: #989898;
      border-bottom: 1px solid #EEEEEE;
    }

    .search_box {
      padding: 20px;
    }

    .search_box input,
    select {
      padding: 5px 10px;
    }

    .search_btn {
      padding: 0 10px;
      margin-left: 20px;
      border: 1px solid #DCDFE6;
    }

    .loading {
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: rgba(255, 255, 255, .8);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 99;
    }
    .loadingimg {
      padding: 20px;
    }
    .showtitle {
      /* width: 55%; */
      display: flex;
      flex-direction: column;
      /* justify-content: flex-end; */
      /* flex-wrap: wrap; */
      padding-right: 5%;
      padding-top: 20px;
    }

    dot {
        display: inline-block; 
        height: 1em;
        line-height: 1;
        text-align: left;
        vertical-align: -.25em;
        overflow: hidden;
    }
    dot::before {
        display: block;
        content: '...\A..\A.';
        white-space: pre-wrap;
        animation: dot 2s infinite step-start both;
    }
    @keyframes dot {
        33% { transform: translateY(-2em); }
        66% { transform: translateY(-1em); }
    }
  </style>

</head>

<body>
  <div id="Vue" class="budebuai" style="padding-bottom: 20px; position: relative;min-width: 850px; margin-left: 190px;">
    <input type="hidden" value="<?php echo $start_time; ?>" id="start_time">
    <input type="hidden" value="<?php echo $end_time; ?>" id="end_time">
    <div class="search_box flex-h">
      <div>
        素材:
        <select id="search" style="width: 200px; height: 40px; border: 1px solid #DCDFE6; margin-right: 20px;">
          <option v-for="item in materialList" :value="item">
            {{item}}
          </option>
        </select>
        时间:
        <el-date-picker style="max-width: 220px" v-model="search.start_time" type="datetime" format="yyyy-MM-dd HH:mm:ss" value-format="yyyy-MM-dd HH:mm:ss" placeholder="选择开始日期">
        </el-date-picker> -
        <el-date-picker style="max-width: 220px" v-model="search.end_time" type="datetime" format="yyyy-MM-dd HH:mm:ss" value-format="yyyy-MM-dd HH:mm:ss" placeholder="选择结束日期">
        </el-date-picker>
        <!-- <input type="text" :value="search.start_time">-<input type="text" :value="search.end_time"> -->
        <!-- <span>{{search.start_time}}</span> - <span>{{search.end_time}}</span> -->
      </div>
      <button class="search_btn" @click="searchOnSubmit">搜索</button>
    </div>
    <div class="BarBox flex-v" style="overflow-y: auto;">
      <div class="loading" v-if="loadingBar">
        <div class="loadingimg" >正在加载中<dot>...</dot></div>
        <!-- <img class="loadingimg" src="../../img/loading.gif" alt=""> -->
      </div>
      <div v-if="dataObj && dataObj.show" class="showtitle">
        <div style="display: flex;justify-content: flex-end;">
          <div style=" margin-right: 10px;" ><span style="color: #00FF00;font-weight: 500;">进线人数:</span>{{dataObj.show.data.start_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #E51A1C;font-weight: 500;">总注册:</span>{{dataObj.show.data.all_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #FF88C2;font-weight: 500;">注册比:</span>{{dataObj.show.data.flavor}}%</div>
          <div style=" margin-right: 10px;" ><span style="color: #55B2BB;font-weight: 500;">签约人数:</span>{{dataObj.show.data.deal_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #FF88C2;font-weight: 500;">成单比:</span>{{dataObj.show.data.deal_flavor}}%</div>
        </div>
        <div style="display: flex;justify-content: flex-end;">
          <div style=" margin-right: 10px;" ><span style="color: #2E4B5E;font-weight: 500;">体验中:</span>{{dataObj.show.data.register_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #000080;font-weight: 500;">体验结束:</span>{{dataObj.show.data.end_experience_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #808080;font-weight: 500;">待申请:</span>{{dataObj.show.data.apply_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #008080;font-weight: 500;">即将成交:</span>{{dataObj.show.data.will_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #F58B64;font-weight: 500;">结束人数:</span>{{dataObj.show.data.end_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #000;font-weight: 500;">黑名单:</span>{{dataObj.show.data.black_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #0066FF;font-weight: 500;">未签协议:</span>{{dataObj.show.data.not_write_count}}</div>
          <div style=" margin-right: 10px;" ><span style="color: #7700FF;font-weight: 500;">暂停推荐:</span>{{dataObj.show.data.timeout_count}}</div>
        </div>     
      </div>
      <div class="barEcharts" id="chartBar" style="width: 100%;height:400px;overflow: auto; padding: 20px;" > <!-- @click="popupDialogEvent" -->
      </div>
    </div>
    <div class="LineBox flex-v" style="overflow-y: auto;">
      <div class="loading" v-if="loadingLine">
        <div class="loadingimg" >加载中···</div>
        <!-- <img class="loadingimg" src="../../img/loading.gif" alt=""> -->
      </div>
      <!-- <div class="padb10" style="color: #323232; font-weight: bold;">模拟收益</div> -->
      <!-- <div class="barEcharts" id="chartLine" style="width: 100%;height:400px;overflow: auto; padding: 20px;"></div> -->
    </div>

    <div id="popup" class="popupDialog">
      <div class="popupBox" @click="popupDialogEvent()">
        <div class="wrapper">
          <div id="popupheader" class="tx-c ft-18 padt10"></div>
          <div class="flex-h pad10 bold flex-vh-center flex-between">
            <span>推送时间</span>
            <span>代码名称</span>
            <span>结果</span>
          </div>
          <!-- <van-list style="height: max-content;">
                        <van-cell v-for="item in popupData" :key="item">
                            <span>{{item.add_time}}</span>
                            <span>{{item.news_code}}</span>
                            <span>{{item.shares_status}}</span>
                        </van-cell>
                    </van-list> -->
          <div class="popup_comtent">
            <!-- <div class="popup_comtent_item pad5 flex-h flex-between" v-for="item in popupData" :key="item.id">
              <span>{{item.add_time}}</span>
              <span>{{item.news_code}}</span>
              <span :style="{color:fontColor[item.shares_status]}">{{item.shares_status}}</span>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script text="text/javascript">
  new Vue({
    el: "#Vue",
    data: {
      loadingBar: false,
      loadingLine: false,
      start_time:$("#start_time").val(),
      end_time:$("#end_time").val(),
      dataObj: {},
      materialList: [], // 素材列表
      search: {
        material: '',
        start_time: '',
        end_time: '',
      },
      url: ''
    },
    watch: {
      dataObj:{ //深度监听，可监听到对象、数组的变化
        handler(val, oldVal){
          console.log("dataObj: "+val, oldVal);
          if(val != oldVal) {
              this.barEchartsFun()
          }
        },
        deep:true //true 深度监听
      }
    },

    created() {
      this.dataObj = JSON.parse(localStorage.getItem("EchartsData")); // 获取本地存储
      // console.log(this.dataObj);
      let locationUrl = window.location.hostname
      if(locationUrl.includes('steady')){
        this.url = 'http://zztong.steady.gszx77.com'
      } else {
        this.url = 'http://zztong.admin.gszx77.com'
      }
    },

    mounted() {
      if(this.dataObj && this.dataObj.xAxis && this.dataObj.xAxis.data) { // 缓存
        this.barEchartsFun()
      } else { //无缓存显示loading
        this.loadingBar = true
      }
      this.getMaterialDataFun();
      this.loadingBar = true
      // this.getDataFun();
      // this.getDataFun();


      console.log('start_time',this.start_time)
      console.log('start_time',this.end_time)

      if(this.start_time && this.end_time){
        console.log(1111111111)
        this.search.start_time = this.formatDate(new Date(this.start_time * 1000), 'yyyy-MM-dd hh:mm:ss');
        this.search.end_time  = this.formatDate(new Date(this.end_time * 1000), 'yyyy-MM-dd hh:mm:ss');
        console.log(this.search.end_time)
        this.searchOnSubmit();
      }else{
        this.getDataFun();
      }
    },
    methods: {
      formatDate(value) {
        let date = new Date(value);
        let y = date.getFullYear();
        let MM = date.getMonth() + 1;
        MM = MM < 10 ? "0" + MM : MM;
        let d = date.getDate();
        d = d < 10 ? "0" + d : d;
        let h = date.getHours();
        h = h < 10 ? "0" + h : h;
        let m = date.getMinutes();
        m = m < 10 ? "0" + m : m;
        let s = date.getSeconds();
        s = s < 10 ? "0" + s : s;
        return y + "-" + MM + "-" + d + " " + h + ":" + m + ":" + s;
      },
      getDataFun(search) {
        axios({
            methods: 'get',
            url: this.url + '/wxadmint1/stastics/getChartData',
            params: search
            // {
              // material: this.search.title,
              // start_time: this.search.start_time,
              // end_time: this.search.end_time
            // }
          })
          .then(res => {
            //成功的回调
            // console.log(res);
            this.dataObj = res.data
            // this.lineEchartsFun();
            this.barEchartsFun();
            localStorage.setItem('EchartsData', JSON.stringify(this.dataObj));
            this.loadingBar = false
          })
          .catch(error => {
            //失败的回调
          });
      },
      searchOnSubmit() {
        this.search.material = document.getElementById("search").value;
        if(this.search.material == '全部') {
          this.search.material = ''
          if(this.search.start_time && this.search.end_time) {
            this.loadingBar = true;
            this.getDataFun(this.search)
          }
        } else {
          this.loadingBar = true;
          this.getDataFun(this.search)
        }
        console.log(this.search) 
      },
      detailsEvent(params) { // type 2注册3签约4结束
        // console.log(params)
        // params.seriesName != '进线人数'
        if(params.seriesName != '成单比') {
          if(params.seriesName == '进线人数'){
            params.seriesName = 1
          } else if(params.seriesName == '总注册'){
            params.seriesName = 2
          } else if(params.seriesName == '签约人数'){
            params.seriesName = 3
          } else if(params.seriesName == '体验结束'){
            params.seriesName = 16
          } else if(params.seriesName == '成单比'){
          //   params.seriesName = 5
          }
          var start_time = (new Date(this.search.start_time)).valueOf()/1000;
          var end_time = (new Date(this.search.end_time)).valueOf()/1000;
          // console.log(start_time)
          // console.log(end_time)
          // return

          window.location.href= "http://zztong.admin.gszx77.com/wxadmint1/stastics/getMaterialUsersList?material="+ params.name + "&type=" + params.seriesName+'&start_time='+ start_time +'&end_time='+ end_time
        }

      },
      getMaterialDataFun() {
        axios({
            methods: 'get',
            url: this.url + '/wxadmint1/stastics/getMaterialData',
            params: {}
          })
          .then(res => {
            //成功的回调
            // console.log(res);
            for(let i in res.data.data){
              this.materialList.push(res.data.data[i])
            }
            this.materialList.unshift('全部')
            // console.log(this.materialList)
          })
          .catch(error => {
            //失败的回调
          });
      },
      popupDialogEvent(param) {
        //seriesIndex：系列序号，dataIndex：数值序列，seriesName：legend名称，name：X轴值，data和value都代表Y轴值
        let seriesIndex = param.seriesIndex;
        let dataIndex = param.dataIndex;
        let seriesName = param.seriesName;
        let name = param.name;
        let data = param.data;
        let value = param.value;
      },
      barEchartsFun() {
        var myChartBar = echarts.init(document.getElementById('chartBar'));
        var optionsBar = {
          title: {
            text: '数据图'
          },
          tooltip: {
            trigger: 'axis',
            axisPointer: {            // 坐标轴指示器，坐标轴触发有效
              type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
            // showContent: true,
            // formatter: function (params) {
            //   var tar = params[1];
            //   return tar.name + '<br/>' + tar.seriesName + ' : ' + tar.value;
            // }
          },
          legend: {
            data: [] //'邮件营销', '联盟广告', '视频广告', '直接访问', '搜索引擎'
          },
          grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
          },
          toolbox: {
            show: true,
            orient: "horizontal",
            right: 120,
            itemGap: 20, 
            itemSize: 15,
            showTitle:true,
            feature: {
              magicType: {                            //动态类型切换
                show: true,                     //各个类型的标题文本，可以分别配置。
                type: ['line', 'bar'],              //启用的动态类型，包括'line'（切换为折线图）, 'bar'（切换为柱状图）, 'stack'（切换为堆叠模式）, 'tiled'（切换为平铺模式）
              },
              restore: {
                show: true
              },
              // saveAsImage: {},
            }
          },
          clickable: true,
          xAxis: {
            show:true,
            type: 'category',
            axisLabel: {
              interval: 0,
              rotate: 40,
              formatter: function(value, index) {
                // return value.split('').join('\n')
                value = value.substring(0, 11);
                return value;
              },
            },
            // barWidth: 30,
            data: [] // '周一', '周二', '周三', '周四', '周五', '周六', '周日'
          },
          yAxis: [
            // type: 'value'
            {
                type: 'value',
                name: '数量',
                axisLabel: {
                    formatter: '{value}'
                }
            },
            {
                type: 'value',
                name: '百分比',
                max: 100,
                interval: 10,
                axisLabel: {
                    formatter: '{value}%'
                }
            }
          ],
          series: [
            // {
            //   name: '邮件营销',
            //   type: 'line',
            //   stack: '总量',
            //   data: [120, 132, 101, 134, 90, 230, 210]
            // },
            // {
            //   name: '联盟广告',
            //   type: 'line',
            //   stack: '总量',
            //   data: [220, 182, 191, 234, 290, 330, 310]
            // },
            // {
            //   name: '视频广告',
            //   type: 'line',
            //   stack: '总量',
            //   data: [150, 232, 201, 154, 190, 330, 410]
            // },
            // {
            //   name: '直接访问',
            //   type: 'line',
            //   stack: '总量',
            //   data: [320, 332, 301, 334, 390, 330, 320]
            // },
            // {
            //   name: '搜索引擎',
            //   type: 'line',
            //   stack: '总量',
            //   data: [820, 932, 901, 934, 1290, 1330, 1320]
            // }
          ]
        };
        if (this.dataObj && this.dataObj.legend) {
          optionsBar.legend.data = this.dataObj.legend.data;
          let ArrList = []
          for(let i in this.dataObj.xAxis.data){
            ArrList.push(this.dataObj.xAxis.data[i])
          }
          optionsBar.xAxis.data = ArrList;
          // console.log(optionsBar.xAxis.data)
          optionsBar.series = this.dataObj.series
          optionsBar.series.forEach(ele => {
            if(ele.name == '成单比'){
              ele.type = 'line';
              ele.yAxisIndex = 1;
            }else {
              ele.type = 'bar'
            }
          })
          myChartBar.setOption(optionsBar);
          // this.loadingBar = false
        }
        myChartBar.on('click', (params) => {
          // console.log('click', params);
          // 执行方法
          // console.log("?material="+ params.name + "&type=" + params.seriesName)
          this.detailsEvent(params)
        });
      },
      lineEchartsFun() {
        var myChartLine = echarts.init(document.getElementById('chartLine'));
        var optionLine = {
          title: {
            text: '折线图'
          },
          tooltip: {
            trigger: 'axis'
          },
          legend: {
            data: [] //'邮件营销', '联盟广告', '视频广告', '直接访问', '搜索引擎'
          },
          grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
          },
          toolbox: {
            feature: {
              // saveAsImage: {},
            }
          },
          xAxis: {
            type: 'category',
            axisLabel: {
              interval: 0,
              rotate: 40,
              formatter: function(value, index) {
                // return value.split('').join('\n')
                value = value.substring(0, 11);
                return value;
              },
            },
            data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日'] // '周一', '周二', '周三', '周四', '周五', '周六', '周日'
          },
          yAxis: {
            type: 'value'
          },
          series: [{
              name: '邮件营销',
              type: 'line',
              stack: '总量',
              data: [120, 132, 101, 134, 90, 230, 210]
            },
            {
              name: '联盟广告',
              type: 'line',
              stack: '总量',
              data: [220, 182, 191, 234, 290, 330, 310]
            },
            {
              name: '视频广告',
              type: 'line',
              stack: '总量',
              data: [150, 232, 201, 154, 190, 330, 410]
            },
            {
              name: '直接访问',
              type: 'line',
              stack: '总量',
              data: [320, 332, 301, 334, 390, 330, 320]
            },
            {
              name: '搜索引擎',
              type: 'line',
              stack: '总量',
              data: [820, 932, 901, 934, 1290, 1330, 1320]
            }
          ]
        };
        if (this.dataObj && this.dataObj.legend) {
          optionLine.legend.data = this.dataObj.legend.data;

          optionLine.xAxis.data = this.dataObj.xAxis.data;
          optionLine.series = this.dataObj.series
          optionLine.series.forEach(ele => {
            ele.type = 'line'
          })
          myChartLine.setOption(optionLine);
          this.loadingLine = false
        }
      },
      getDataList() {
        let that = this; //回掉this指向问题undfine
        axios.get('https://wjgzh.hczq.com/index/history/all', {
            params: {
              name: "zhitougu",
              start_time: that.start_time,
              end_time: that.end_time
            }
          })
          .then(function (res) {
            //成功的回调
            that.popupData = res.data.data.data;
            that.popupData.forEach((ele) => {
              ele.add_time = ele.add_time.split(' ')[0].split('-')[1] + '-' + ele.add_time.split(' ')[0]
                .split('-')[2] + ' ' + ele.add_time.split(' ')[1].split(':')[0] + ':' + ele.add_time.split(
                  ' ')[1].split(':')[1]
            })
          })
          .catch(function (error) {
            //失败的回调
          });
      }
    },

  })

  // function alertMsg(txt) {
  //   var alertFram = document.createElement("DIV");
  //   alertFram.id = "alertFram";
  //   alertFram.style.position = "fixed";
  //   alertFram.style.width = "100%";
  //   alertFram.style.textAlign = "center";
  //   alertFram.style.top = "50%";
  //   alertFram.style.zIndex = "10001";
  //   strHtml =
  //     " <span style=\"font-family: 微软雅黑;display:inline-block;background:rgba(0,0,0,0.8);color:#fff;padding:10px 20px;width: auto%;line-height:36px;border-radius:6px; \">" +
  //     txt + "</span>";
  //   alertFram.innerHTML = strHtml;
  //   document.body.appendChild(alertFram);
  //   setTimeout((function () {
  //     alertFram.style.display = "none";
  //   }), 2000);
  // };
</script>

</html>
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
