<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/home/wwwroot/estate.1yuaninfo.com/./application/wxadmint1/view/users/index.html";i:1639984651;s:73:"/home/wwwroot/estate.1yuaninfo.com/application/wxadmint1/view/layout.html";i:1639992621;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>天信诚-后台管理系统</title>

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
							天信诚
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
				<a href="#">用户</a>
			</li>
			<li class="active">用户列表</li>
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
				用户
				<small>
					<i class="icon-double-angle-right"></i>
					用户列表
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<div class="row">
					<div class="col-xs-12">
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-success btn-lg dropdown-toggle">
								导出客户类型
								<i class="icon-angle-down icon-on-right"></i>
							</button>

							<ul class="dropdown-menu dropdown-success pull-right">
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=8">黑名单</a>
								</li>


								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=16">体验结束</a>
								</li>

								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=24">即将成交</a>
								</li>
								<!--<li>-->
									<!--<a href="<?php echo url('users/daochus'); ?>?type=12">再激活</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('users/daochus'); ?>?type=6">内部员工</a>-->
								<!--</li>-->
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=11">暂停服务</a>
								</li>
								<!--<li>-->
									<!--<a href="<?php echo url('users/daochus'); ?>?type=16">取关用户</a>-->
								<!--</li>-->
								<!--<li>-->
									<!--<a href="<?php echo url('users/daochus'); ?>?type=17">未关注</a>-->
								<!--</li>-->
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=23">成交用户</a>
								</li>
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=25">待申请体验用户</a>
								</li>
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=1116">全部数据（关注）</a>
								</li>
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=1117">全部数据（未关注）</a>
								</li>
								<li>
									<a href="<?php echo url('users/daochus'); ?>?type=1118">全部数据（取消关注）</a>
								</li>

							</ul>
						</div>
						<div class="table-responsive">
				<!-- 搜索框 -->
				<form class="form-search" action="<?php echo url('wxadmint1/users/index'); ?>">
					<input type="hidden" name="v" value="1">
					<span class="input-icon">
						<input type="text" placeholder="请输入开发人员" class="nav-search-input" id="nav-search-input" autocomplete="off" name='user_develop_people'/>
						<input type="text" placeholder="请输入激活人员" class="nav-search-input" id="nav-search-input" autocomplete="off" name='user_activate_people'/>
						<input type="text" placeholder="请输入新单人员" class="nav-search-input" id="nav-search-input" autocomplete="off" name='user_first_people'/>
						<br />
						<input type="text" placeholder="联系方式" class="nav-search-input" id="nav-search-input" autocomplete="off" name='search' <?php if(!(empty($search) || (($search instanceof \think\Collection || $search instanceof \think\Paginator ) && $search->isEmpty()))): ?>  value=<?php echo $search; else: ?> value="" <?php endif; ?>  />
						<input type="text" placeholder="请输入用户备注" class="nav-search-input" id="nav-search-input" autocomplete="off" name='user_remark'/>
						<i class="icon-search nav-search-icon"></i>
						<input type="text" placeholder="微信昵称" class="nav-search-input" id="nav-search-input" autocomplete="off" name='wx_nickname'/>
						<i class="icon-search nav-search-icon"></i>
										<!-- <input type="text" placeholder="请输入使用次数" class="nav-search-input" id="nav-search-input" autocomplete="off" name='num'/> -->
						<i class="icon-search nav-search-icon"></i>
						<select name="type_id">
							<option value="">请选择用户类型
							<option value="1">游客
							<option value="2">体验用户
								<!--<option value="16">结束体验-->
								<!--<option value="25">待申请体验-->
								<!--<option value="27">试用分组-->
							<option value="3">签约用户
								<!--<option value="4">结束用户-->
								<!--<option value="7">升级用户-->
							<option value="8">黑名单
							<option value="9">退款用户
								<!--<option value="11">未签协议-->
								<!--<option value="12">签约无服务-->
								<!--<option value="13">介绍-->
							<option value="24">即将成交
							<option value="5">取消关注
								<!--<option value="10">未关注-->
							<option value="6">内部员工
							<option value="28">其他
							<option value="29">多次取关
								<!--<option value="26">暂停推荐-->

						</select>
						<select name="user_status">
							<option value="">关注状态
							<option value="1">关注
							<option value="2">未关注
							<option value="3">取消关注

						</select>
						<select name="type_time">
							<option value="">注册时间
							<option value="1">关注时间
							<option value="2">取消时间

						</select>
						<select name="is_agree">
							<option value="">声明
							<option value="1">已点击
							<option value="0">未点击
							<option value="2">注册点击
							<option value="3">推送点击

						</select>
						<select name="is_extend">
							<option value="">是否推广数据
							<option value="1">是
							<option value="2">否

						</select>
					</span>
								<!--<span class="input-icon">-->
					<!--<select name="is_platform">-->
						<!--<option value="">请选择红包领取类型-->
						<!--<option value="1">未领取-->
						<!--<option value="2">已领取未使用-->
						<!--<option value="3">已使用-->

					<!--</select>-->
				<!--</span>-->
								<br/>
								时间范围：<input type="text" name='start_date' id='dates'  onclick="laydates()">----<input type="text" name='end_date' id='date'  onclick="laydate()">
								<input type="submit" value='搜索' class="btn btn-info" style="border:0;padding:4px 10px;background:#4f99c6;color:#fff;">

							</form>
							<a href="daochu.html"><input type="button" value='导出体验客户' class="btn btn-info" style="border:0;padding:4px 10px;background:#4f99c6;color:#fff;"></a>
							<!--	<a href="jsuser.html"><input type="button" value='导出结束客户' class="btn btn-info" style="border:0;padding:4px 10px;background:#4f99c6;color:#fff;"></a>-->
							<!--	<a href="checksea.html"><input type="button" value='导入公海客户' class="btn btn-info" style="border:0;padding:4px 10px;background:#4f99c6;color:#fff;"></a>
                                <a href="checkagain.html"><input type="button" value='导入再激活客户' class="btn btn-info" style="border:0;padding:4px 10px;background:#4f99c6;color:#fff;"></a>-->
							<br/>
							<span class="btn btn-sm" data-rel="tooltip" title="" data-original-title="Default">用户总人数：<?php echo $us; ?></span>

							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<!--<th class="center">-->
										<!--<label>-->
											<!--<input type="checkbox" class="ace" />-->
											<!--<span class="lbl"></span>-->
										<!--</label>-->
									<!--</th>-->
									<th>用户ID</th>
									<th>来源</th>
									<!--<th>推广时间</th>-->
									<th>关注时间</th>
									<th>注册时间</th>
									<th>取关时间</th>
									<th>昵称</th>
									<th>姓名</th>
									<th>手机</th>
									<th>类型</th>
									<th>开发</th>
									<th>激活</th>
									<th>新单</th>
									<!--<th>服务人员</th>-->
									<th>备注</th>
									<th>状态</th>
									<!--//ly：2021-11-4 修改-->
									<!--<th>剩余次数</th>-->
									<th>查看总数</th>
									<th>持股</th>
									<th>成功</th>
									<th>失败</th>
									<th>调仓</th>
									<th>推送总数</th>
									<th style="width:80px;">其他平台</th>
									<!--<th>素材</th>-->
									<th>类型</th>
									<!--<th>方法</th>-->
									<!--<th>规则</th>-->
									<th>声明</th>
									<!--<th>声明时间</th>-->
									<!--<th>产品金额</th>-->
									<!--<th>购买时间</th>-->
									<!--<th>资金量</th>-->
									<!--<th>地区</th>-->
									<th>问卷调查</th>
									<th>新人福利</th>

									<th>操作</th>
								</tr>
								</thead>
								<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($key % 2 );++$key;?>
								<tbody>
								<tr>
									<td><?php echo $data['id']; ?></td>
									<td><?php if($data['platform'] == 'wechat'): ?>朋友圈<?php endif; ?></td>
									<!--<td><?php if($data['tui_time'] != ''): ?><?php echo $data['tui_time']; endif; ?></td>-->
									<td><?php if($data['add_time'] != ''): ?><?php echo date('Y-m-d H:i:s',$data['add_time']); endif; ?></td>
									<td><?php if($data['register_time'] != ''): ?><?php echo date('Y-m-d H:i:s',$data['register_time']); endif; ?></td>
									<td><?php if($data['out_time'] != ''): ?><span style="color:green;"><?php echo date('Y-m-d H:i:s',$data['out_time']); ?></span><?php endif; ?></td>
									<td><?php if($adminid['group_id'] == 51): if(in_array(($data['type_id']), explode(',',"3,4,7,9,11,12,23,24,26,27,8"))): ?>
										<?php echo $data['wx_nicknames']; else: ?>
										<?php echo $data['wx_nickname']; endif; else: ?>
										<?php echo $data['wx_nickname']; endif; ?>

										</td>
									<td><?php if($adminid['group_id'] == 51): if(in_array(($data['type_id']), explode(',',"3,4,7,9,11,12,23,24,26,27,8"))): ?>
										<?php echo $data['user_names']; else: ?>
										<?php echo $data['user_name']; endif; else: ?>
										<?php echo $data['user_name']; endif; ?>
									</td>
									<td>
										<?php if($adminid['group_id'] == 51): if(in_array(($data['type_id']), explode(',',"3,4,7,9,11,12,23,24,26,27,8"))): ?>
										****
										<?php else: ?>
										<?php echo $data['user_tel']; endif; else: ?>
										<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>
										<?php endif; ?>
										<!---->
										<!---->
										<!--<?php if($adminid['group_id'] == 39): ?>-->
										<!--<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>-->
										<!--<?php elseif($adminid['group_id'] == 53): ?>-->
										<!--<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>-->
										<!--<?php elseif($adminid['group_id'] == 54): ?>-->
										<!--<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>-->
										<!--<?php elseif($adminid['group_id'] == 52): ?>-->
										<!--<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>-->
										<!--<?php elseif($adminid['group_id'] == 55): ?>-->
										<!--<a href="<?php echo url('wxadmint1/order/index'); ?>?v=1&user_tel=<?php echo $data['user_tel']; ?>"><?php echo $data['user_tel']; ?></a>-->
										<!--<?php else: ?>-->
											<!--<?php echo $data['tel']; ?>-->
										<!--<?php endif; ?>-->
									</td>
									<td><?php if($data['type_name'] == "注册用户"): ?>体验用户<?php else: ?><?php echo $data['type_name']; endif; ?></td>
									<td>
										<?php if($data['user_develop_people'] == "0"): else: ?><?php echo $data['user_develop_people']; endif; ?>
									</td>
									<td>
										<?php if($data['user_activate_people'] == "0"): else: ?><?php echo $data['user_activate_people']; endif; ?>
									</td>
									<td>
										<?php if($data['user_first_people'] == "0"): else: ?><?php echo $data['user_first_people']; endif; ?>
									</td>
									<!--<td>-->
										<!--<?php if($data['user_server_people'] == "0"): else: ?><?php echo $data['user_server_people']; endif; ?>-->
									<!--</td>-->
									<td><?php if(empty($data['user_remark'])): else: ?><?php echo $data['user_remark']; endif; ?></td>

									<!-- <td><?php if(empty($data['timess'])): ?>0<?php else: ?><?php echo $data['timess']['0']['order_sum']; endif; ?></td> -->
									<td><?php if($data['user_status'] == 1): ?><span style="color:red;">关注</span>
										<?php elseif($data['out_time'] == ''): ?><span style="color:blue;">未关注</span>
										<?php else: ?>
										<span style="color:green;">取消关注</span><?php endif; ?></td>

									<!--//ly：2021-11-4 修改-->
									<!--<td><?php echo $data['experience_num']; ?></td>-->

									<td><a href="<?php echo url('wxadmint1/users/stock'); ?>?openid=<?php echo $data['openid']; ?>&user_name=<?php echo $data['user_name']; ?>&user_id=<?php echo $data['id']; ?>&s_status=4"><?php echo $data['count_num']; ?></a></td>

									<td><a href="<?php echo url('wxadmint1/users/stock'); ?>?openid=<?php echo $data['openid']; ?>&user_name=<?php echo $data['user_name']; ?>&user_id=<?php echo $data['id']; ?>&s_status=5"><?php echo $data['user_holdnum']; ?></a></td>
									<td><a href="<?php echo url('wxadmint1/users/stock'); ?>?openid=<?php echo $data['openid']; ?>&user_name=<?php echo $data['user_name']; ?>&user_id=<?php echo $data['id']; ?>&s_status=1"><?php echo $data['success_num']; ?></a></td>
									<td><a href="<?php echo url('wxadmint1/users/stock'); ?>?openid=<?php echo $data['openid']; ?>&user_name=<?php echo $data['user_name']; ?>&user_id=<?php echo $data['id']; ?>&s_status=2"><?php echo $data['error_num']; ?></a></td>
									<td><a href="<?php echo url('wxadmint1/users/stock'); ?>?openid=<?php echo $data['openid']; ?>&user_name=<?php echo $data['user_name']; ?>&user_id=<?php echo $data['id']; ?>&s_status=3"><?php echo $data['ware_num']; ?></a></td>

									<td><a href="<?php echo url('wxadmint1/users/push'); ?>?user_id=<?php echo $data['id']; ?>"><?php echo $data['push_num']; ?></a></td>
									<td><?php if($data['is_other_wx'] == ''): ?>否<?php else: ?><?php echo $data['is_other_wx']; endif; ?></td>
									<td><?php echo $data['dao_source_type']; ?></td>
									<!--<td><a href="<?php echo url('wxadmint1/users/customer_list'); ?>?user_id=<?php echo $data['id']; ?>"><?php if($data['is_attention_log'] == 0): ?><span style="color: red">未点击</span><?php else: ?>点击<?php endif; ?></a></td>-->
									<!--<td><a href="<?php echo url('wxadmint1/users/customer_list'); ?>?user_id=<?php echo $data['id']; ?>&type=2"><?php if($data['is_rule_log'] == 0): ?><span style="color: red">未点击</span><?php else: ?>点击<?php endif; ?></a></td>-->
									<td><a href="<?php echo url('wxadmint1/users/state_list'); ?>?user_id=<?php echo $data['id']; ?>"><?php if($data['is_agree'] == 0): ?><span style="color: red">未点击</span><?php else: ?>点击<?php endif; ?></a></td>


									<!--<td><?php if($data['is_agree_time'] == ''): ?>暂无<?php else: ?><?php echo date('Y-m-d H:i:s',$data['is_agree_time']); endif; ?></td>-->
									<td>
										<?php if($data['is_survey'] == 0): ?>
											<span style="color: red">未点击</span>
										<?php else: ?>
											<a href="<?php echo url('wxadmint1/survey/user_show'); ?>?user_id=<?php echo $data['id']; ?>&is_sub=<?php echo $data['is_survey']; ?>">点击</a>
										<?php endif; ?>
									</td>
									<!--活动-->
									<td>
										<?php if($data['is_activity'] == 1): ?>
										<span style="color: red">未领取</span>
										<?php else: ?>
										<span style="color: green">已领取</span>
										<?php endif; ?>
									</td>
									<!--活动end-->
									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
											<a href="<?php echo url('wxadmint1/users/upd'); ?>?user_id=<?php echo $data['id']; ?>"><button class="btn btn-xs btn-info">
												<i class="icon-edit bigger-120">修改</i>
											</button></a>


											<a onclick="if(!confirm('您确定要删除所选用户的所有信息吗')){return false;}"  href="<?php echo url('wxadmint1/users/del'); ?>?user_id=<?php echo $data['id']; ?>"><button class="btn btn-xs btn-danger">
												<i class="icon-trash bigger-120"></i>
											</button>
											</a>

											<span id="upd_one"><button id="upd" style="border:0;background:#0099cc;padding:3px 5px;color:#fff;" onclick="checked(this,'<?php echo $data['id']; ?>','<?php echo $data['user_name']; ?>')">申请</button></span>
											<span id="upd_one"><a href="<?php echo url('wxadmint1/users/customer_list'); ?>?user_id=<?php echo $data['id']; ?>"><button id="qq" style="border:0;background:#0099cc;padding:3px 5px;color:#fff;">记录</button></a></span>
										</div>
									</td>
								</tr>
								</tbody>
								<?php endforeach; endif; else: echo "" ;endif; ?>






								<script>

                                    function checked(ts,$user_id,$user_name)
                                    {
                                        var user_id = $user_id;
                                        var user_name=$user_name;
//alert(ts);
                                        $.mbox({
                                            area: [ "450px", "auto" ], //弹框大小
                                            border: [ 0, .5, "#666" ],
                                            dialog: {
                                                msg: "<p>用户姓名："+user_name+"</p>添加次数：<input type='text' id='num' style='width:50px;border:0;border-bottom:#f2f2f2 solid 1px'>",
                                                btns: 2,   //1: 只有一个按钮   2：两个按钮  3：没有按钮 提示框
                                                type: 2,   //1:对钩   2：问号  3：叹号
                                                btn: [ "确定", "取消"],  //自定义按钮
                                                yes: function() {
                                                    var num =$('#num').val();
                                                    var regu = /^[1-9]\d*$/;
                                                    if(num.length!='')
                                                    {
                                                        if(!regu.test(num))
                                                        {
                                                            alert('申请次数不合法');
                                                        }else
                                                        {
                                                            $.ajax({
                                                                data:{'user_id':user_id,'apply_num':num},
                                                                url:"<?php echo url('wxadmint1/users/numupd'); ?>",
                                                                type:'POST',
                                                                success:function(msg)
                                                                {
                                                                    //alert(msg);
                                                                    if(msg=='1')
                                                                    {
                                                                        alert('申请成功');
                                                                    }else if(msg=='2')
                                                                    {
                                                                        alert('申请失败');
                                                                    }else if(msg=='4')
                                                                    {
                                                                        alert('管理员尚未同意该用户之前的申请');
                                                                    }else if(msg=='5')
                                                                    {
                                                                        alert('该用户免费体验暂未结束无法申请');
                                                                    }
                                                                }
                                                            })
                                                        }

                                                    }else
                                                    {
                                                        alert('申请次数不能为空');
                                                    }




                                                },
                                                no: function() { //点击右侧按钮：失败
                                                    return false;
                                                }
                                            }
                                        });


                                    }
                                    //答对问题申请添加次数
                                    function checkee($user_id)
                                    {
                                        if(confirm('确定给该用户添加服务次数吗？'))
                                        {
                                            //alert('123');
                                            var user_id=$user_id;
                                            //alert(user_id);
                                            $.ajax({
                                                type:'POST',
                                                data:{'user_id':user_id},
                                                url:"comp.html",
                                                success:function(msg)
                                                {
                                                    //alert(msg);
                                                    if(msg=='1')
                                                    {
                                                        alert('该用户为内部员工');
                                                    }else if(msg=='2')
                                                    {
                                                        alert('该用户为游客,请提醒注册');
                                                    }else if(msg=='3')
                                                    {
                                                        alert('该用户为体验用户,次数添加成功');
                                                    }else if(msg=='5')
                                                    {
                                                        alert('该用户为结束用户,已转为体验用户,次数添加成功');
                                                    }else if(msg=='4')
                                                    {
                                                        alert('次数添加失败');
                                                    }
                                                }
                                            });
                                        }else
                                        {
                                            return false;
                                        }

                                    }
                                    //答错问题模板推送
                                    function checkep($user_id)
                                    {
                                        if(confirm('确定该用户回答错误吗？'))
                                        {
                                            //alert('123');
                                            var user_id=$user_id;
                                            //alert(user_id);
                                            $.ajax({
                                                type:'POST',
                                                data:{'user_id':user_id},
                                                url:"come.html",
                                                success:function(msg)
                                                {
                                                    if(msg=='1')
                                                    {
                                                        alert('发送成功');
                                                    }
                                                }
                                            });
                                        }else
                                        {
                                            return false;
                                        }
                                    }


								</script>

								<!-- <script src="/public/static/admin//js/jquery.min.js"></script> -->
								<script src="/public/static/admin//data_files/laydate.js"></script>
								<link type="text/css" rel="stylesheet" href="/public/static/admin/data_files/laydate.css">
								<link type="text/css" rel="stylesheet" href="/public/static/admin/data_files/laydate1.css" id="LayDateSkin">
								<!-- 日期插件 -->
								<script>
                                    ;!function(){
                                        laydate({
                                            elem: '#demo'
                                        })
                                    }();
								</script>

								<script>
                                    ;!function(){
                                        laydate({
                                            elem: '#dates'
                                        })
                                    }();
								</script>



							</table>
							<?php if($page != ''): ?>
							<?php echo $page; endif; ?>


						</div><!-- /.table-responsive -->
					</div><!-- /span -->
				</div><!-- /row -->




			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->


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
