<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>Smart Brain Web Content Management Panel</title>
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		
		<link rel="shortcut icon" href="favicon.ico" />
		
		<!-- bootstrap framework -->
		<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
		<link rel="stylesheet" href="<?php echo $this->baseUrl();?>/ext/j-file-upload/css/style.css">
		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" href="<?php echo $this->baseUrl();?>/ext/j-file-upload/css/jquery.fileupload.css"> 
		<script src="<?php echo $this->baseUrl();?>/ext/j-file-upload/js/jquery.fileupload.js"></script>
		<script src="<?php echo $this->baseUrl();?>/ext/j-file-upload/js/vendor/jquery.ui.widget.js"></script>
		
		<!-- custom icons -->
			<!-- font awesome icons -->
			<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
			<!-- ionicons -->	
			<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen">
			<!-- flags -->
			<link rel="stylesheet" href="<?php echo $this->baseTheme();?>/admin/tisa/assets/icons/flags/flags.css">
				
		<!--custom yii-->
		<link rel="stylesheet" href="<?php echo $this->baseUrl();?>/css/form.css">
		
	<!-- page specific stylesheets -->
		<!-- select2 -->
		<link rel="stylesheet" href="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/select2/select2.css">
		<!-- bootstrap switches -->
		<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
		<!-- moment.js (date library) -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/moment-js/moment.min.js"></script>
		
		<!-- nvd3 charts -->
		<link rel="stylesheet" href="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/novus-nvd3/nv.d3.min.css">
		<!-- owl carousel -->
		<link rel="stylesheet" href="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/owl-carousel/owl.carousel.css">
				
		<!-- main stylesheet -->
		<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/css/style.css" rel="stylesheet" media="screen">
		
		<!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'>
		
		<!-- moment.js (date library) -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/moment-js/moment.min.js"></script>
		<style>
			.grid-view table tr td:last-child{
				width:8% !important;
			}
		</style>
    </head>
    <body class="<?php echo isset(Yii::app()->user->theme) ? Yii::app()->user->theme:"";?>">
		<!-- top bar -->
		<header class="navbar navbar-fixed-top" role="banner">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="dashboard.html" class="navbar-brand"><img src="<?php echo $this->baseTheme();?>/admin/tisa/assets/img/blank.gif" alt="Logo"></a>
				</div>
				<ul class="top_links TIMER">
					<li>
						<a><span><?php echo date('d');?></span><?php echo date('F Y');?></a>
					</li>
					<li>
						<a><span><?php echo date('H');?></span><?php echo date('i:s');?></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php /*<li class="lang_menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="flag-US"></span> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="user_profile.html"><span class="flag-FR"></span> France</a></li>
							<li><a href="mail_inbox.html"><span class="flag-IN"></span> India</a></li>
							<li><a href="tasks_summary.html"><span class="flag-BR"></span> Brasil</a></li>
							<li><a href="tasks_summary.html"><span class="flag-GB"></span> UK</a></li>
						</ul>
					</li>*/ ?>
					<li class="user_menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="navbar_el_icon ion-person"></span> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/profile">Profile</a></li>
							<?php /*
							<li><a href="mail_inbox.html">My messages</a></li>
							<li><a href="tasks_summary.html">My tasks</a></li>*/ ?>
							<li class="divider"></li>
							<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</header>
		
		<!-- main content -->
		<div id="main_wrapper">
			<div class="page_content">
				<?php echo $content;?>	
			</div>
		</div>

		<!-- side navigation -->
		<nav id="side_nav">
			<ul>
				<?php if($this->isRights('dashboard')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/dashboard"><span class="ion-speedometer"></span> <span class="nav_title">Dashboard</span></a>
				</li>
				<?php } ?>
				<?php if($this->isRights('website')){?>
				<li>
					<a href="#">
						<span class="ion-clipboard"></span>
						<span class="nav_title">Website</span>
					</a>
					<div class="sub_panel">
						<div class="side_inner">
							<?php if($this->isRights('pages') || $this->isRights('menus') || $this->isRights('footermenus')){?>
							<h4 class="panel_heading panel_heading_first">Website</h4>
							<ul>
								<?php if($this->isRights('pages')){?>
								<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/pages/admin"><span class="side_icon ion-ios7-folder-outline"></span> Pages Management</a></li>
								<?php } ?>
								<?php if($this->isRights('menus')){?>
								<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/menus/admin"><span class="side_icon ion-ios7-folder-outline"></span> Menus Management</a></li>
								<?php } ?>
								<?php if($this->isRights('footermenus')){?>
								<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/footermenus/admin"><span class="side_icon ion-ios7-folder-outline"></span> Footer Link</a></li>
								<?php } ?>
							</ul>
							<?php } ?>
							<?php if($this->isRights('categorynews') || $this->isRights('news')){?>
							<h4 class="panel_heading panel_heading_second">News</h4>
							<ul>
								<?php if($this->isRights('categorynews')){?>
								<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/categorynews/admin">
									<span class="side_icon ion-ios7-folder-outline"></span> Categories Management</a>
								</li>
								<?php } ?>
								<?php if($this->isRights('news')){?>
								<li><a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/news/admin">
									<span class="side_icon ion-ios7-folder-outline"></span> News Management</a>
								</li>
								<?php } ?>
							</ul>
							 
							<?php } ?>
							
							
						</div>
					</div>
				</li>
				<?php } ?>
				<?php if($this->isRights('media')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/media">
						<span class="ion-image"></span>
						<span class="nav_title">Media</span>
					</a>
				</li>
				<?php } ?>
				<?php if($this->isRights('email')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/emails">
						<span class="ion-ios7-email-outline"></span>
						<span class="nav_title">Email</span>
					</a>
				</li>
				<?php } ?>
				<?php if($this->isRights('seo')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/seomatchurl">
						<span class="fa fa-globe"></span>
						<span class="nav_title">Seo Match Url</span>
					</a>
				</li>
				<?php } ?>
				<?php if($this->isRights('user')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/userprivileges">
						<span class="fa fa-user-md"></span>
						<span class="nav_title">Users</span>
					</a>
				</li>
				<?php } ?>
				<?php if($this->isRights('setting')){?>
				<li>
					<a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/config">
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="nav_title">Setting</span>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>

		<!-- right slidebar -->
		<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<div class="view-x"></div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- jQuery -->
		<!--
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/jquery.min.js"></script>
		-->
		<?php Yii::app() -> clientScript -> registerCoreScript('jquery'); ?>
        <?php Yii::app() -> clientScript -> registerCoreScript('jquery.ui'); ?>
        
		<!-- easing -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/jquery.easing.1.3.min.js"></script>
		<!-- bootstrap js plugins -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- top dropdown navigation -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/tinynav.js"></script>
		<!-- perfect scrollbar -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js"></script>
		
		<!-- common functions -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/tisa_common.js"></script>
		
		<!-- style switcher -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/tisa_style_switcher.js"></script>
		
		<!--calendar-->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<!-- page specific plugins -->

		<!-- nvd3 charts -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/d3/d3.min.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/novus-nvd3/nv.d3.min.js"></script>
		<!-- flot charts-->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/flot/jquery.flot.min.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/flot/jquery.flot.tooltip.min.js"></script>
		<!-- clndr -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/underscore-js/underscore-min.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/CLNDR/src/clndr.js"></script>
		<!-- easy pie chart -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
		<!-- owl carousel -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/owl-carousel/owl.carousel.min.js"></script>
		
		<!-- multiselect, tagging -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/select2/select2.min.js"></script>
		<!--  bootstrap switches -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js"></script>
		
		<!-- user profile functions -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/apps/tisa_user_profile.js"></script>
		
		
		<!-- dashboard functions -->
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/apps/tisa_dashboard.js"></script>
		<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/myJs.js"></script>
		<script src="<?=$this->baseUrl();?>/ext/ckedifind/ckeditor/ckeditor.js"></script>
		<?php
        echo $this->renderPartial('/layouts/tisaStoreNotification');
        ?>
    </body>
</html>
