<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->

<head>

	<!-- Meta -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $this->Website->description;?>" />
	<meta name="author" content="Kuuga" />
	<meta name="keywords" content="<?php echo $this->Website->keywords;?>" />
	<title><?php echo $this->Website->title;?> | <?php echo $this->Website->name;?></title>
	<meta property="og:title" content="<?php echo $this->Website->title;?>" />
	<meta property="og:site_name" content="<?php echo $this->Website->name;?>"/>
	<meta property="og:description" content="<?php echo $this->Website->description;?>" />


	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $this->Website->favicon;?>">

	<!-- Google Fonts & Fontawesome -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,300italic,100italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

	<!-- CSS -->
    <link rel="stylesheet" href="<?php echo $this->getBaseTheme('front','gazeta');?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->getBaseTheme('front','gazeta');?>js/vendor/slick/slick.css">
    <link rel="stylesheet" href="<?php echo $this->getBaseTheme('front','gazeta');?>css/style.css">
	<link rel="stylesheet" href="<?php echo $this->getBaseTheme('front','gazeta');?>css/myStyle.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php echo $this->getBaseTheme('front','gazeta');?>https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?php echo $this->getBaseTheme('front','gazeta');?>https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=659572570745079&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<!-- Topbar -->
<div class="top-bar container">
	<div class="row">
		<div class="col-md-6">
			<ul class="tb-left">
				<li class="tbl-date">Today is: <span><?php echo date('l, F d, Y');?></span></li>
				<?php /*<li class="tbl-temp"><i class="fa fa-sun-o"></i>32 C</li> */?>
			</ul>
		</div>
		<div class="col-md-6">
			&nbsp;<?php /*<ul class="tb-right">
				<li class="tbr-social">
					<span>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-google-plus"></a>
					<a href="#" class="fa fa-pinterest"></a>
					<a href="#" class="fa fa-youtube"></a>
					</span>
				</li>
			</ul>*/ ?>
		</div>
	</div>
</div>

<div class="container wrapper">

	<!-- Header -->
	<header>
		<div class="col-md-12">
			<div class="row">
			
				<!-- Navigation -->
				<div class="col-md-12">
					<div class="menu-trigger"><i class="fa fa-align-justify"></i> Menu</div>
					<nav>
						<?php $this->renderPartial('/layouts/top-menu');?>
					</nav>
					
					<!-- Search -->
					<div class="search">
						<form>
							<input type="search" placeholder="Type to search and hit enter">
						</form>
					</div>
					<span class="search-trigger"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</header>
	
	<div class="header">
		<div class="col-md-12">
			<div class="col-md-12">
				<!-- Logo -->
				<div class="col-md-4 logo">
					<h1><a href="index.html">Gazeta</a></h1>
				</div>
				<?php
				$NewsTicker = $this->getBreakingNewsTicker(5);
				if(!empty($NewsTicker)){
				?>
				<!-- News Ticker -->
				<div class="col-md-8">
					<div class="news-ticker">
						<div id="news-ticker">
							<?php foreach($NewsTicker as $tick){?>
							<div class="item">
								<span><?php echo $tick->topic_category;?></span>
								<h4><a href="<?php echo $tick->url_link;?>" title="<?php echo $tick->news_title;?>"><?php echo $tick->news_title;?></a></h4>
								<p>Posted on : <?php echo date('F d, Y',strtotime($tick->news_date));?></p>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div class="main-content container">
		<!-- Category Content -->
		<?php echo $content;?>
		
		<!-- Sidebar -->
		<aside class="col-md-4">
		
			<!-- Popular News -->
			<?php
			$getLatestNewsText = $this->getLatestNewsText();
			if(!empty($getLatestNewsText)){
			?>
			<div class="side-widget p-news">
				<h5><span>Latest News</span></h5>
				<div class="sw-inner">
					<ul>
						<?php foreach($getLatestNewsText as $latest){?>
						<li>
							<div class="pn-info" style="margin-left: 0px;">
								<span>Sepak Bola International</span>
								<h4><a href="<?php echo $latest->url_link;?>"><?php echo $latest->news_title;?></a></h4>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>
			<!-- Banner -->
			<div class="side-widget sw-banner">
				<a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/banner/2.jpg" class="img-responsive" alt=""/></a>
			</div>
			
			<!-- Twitterfeed -->
			<div class="side-widget sw-twitter">
				<h5><span>Fb Recommendations</span></h5>
				<div class="sw-inner">
					<div class="fb-recommendations" data-app-id="659572570745079" data-site="shariveweb.com" data-action="likes, recommends" data-width="355" data-height="546" data-colorscheme="light" data-header="false"></div>
				</div>
			</div>
			<?php /*
			<!-- Video  -->
			<div class="side-widget sw-video">
				<h5><span>Featured Video</span></h5>
				<div class="sw-inner">
					<ul>
						<li>
							<div class="swv-thumb">
								<img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/7.jpg" class="img-responsive" alt=""/>
							</div>
							<span>Travelling</span>
							<h4><a href="single_post.html">Lorem Ipsum Dolor Sit Amet, Consetetuer Adipiscing Elit</a></h4>
						</li>
						<li>
							<i class="fa fa-video-camera"></i>
							<span>Entertainment</span>
							<h4><a href="single_post.html">Lorem Ipsum Dolor Sit Amet, Consetetuer Adipiscing Elit</a></h4>
						</li>
						<li>
							<i class="fa fa-video-camera"></i>
							<span>Sport</span>
							<h4><a href="single_post.html">Lorem Ipsum Dolor Sit Amet, Consetetuer Adipiscing Elit</a></h4>
						</li>
					</ul>
				</div>
			</div>
			*/ ?>
			<?php /*
			<!-- Poll  -->
			
			<div class="side-widget sw-poll">
				<h5><span>Polling Box</span></h5>
				<div class="sw-inner">
					<h4>Investigationes demonstrant lectores legere me lius quod legunt saepius ?</h4>
					<form>
						<ul>
							<li><input type="radio" name="radiog_lite" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup1">Lorem ipsum dolor sit amet, consectetuer</label></li>
							<li><input type="radio" name="radiog_lite" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup1">Sed diam nonummy nibh euismod tincidunt</label></li>
							<li><input type="radio" name="radiog_lite" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup1">Ullamcorper suscipit lobortis</label></li>
							<li><input type="radio" name="radiog_lite" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup1">Claritas est etiam processus dynamicus</label></li>
						</ul>
					</form>
					<div class="dual-btns">
						<a href="#">Vote</a>
						<a href="#">View Result</a>
					</div>
				</div>
			</div>
			*/ ?>
			<?php /*
			<!-- Contributors  -->
			
			<div class="side-widget sw-contributors">
				<h5><span>Contributors</span></h5>
				<div class="sw-inner">
					<ul>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/1.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/2.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/3.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/4.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/5.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/6.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/7.jpg" class="img-responsive" alt=""/></a></li>
						<li><a href="contributor.html"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/1/8.jpg" class="img-responsive" alt=""/></a></li>
					</ul>
				</div>
			</div>
			*/ ?>
			<!-- Newsletter  -->
			<div class="side-widget sw-subscribe">
				<h5><span>Subscribe</span></h5>
				<div class="sw-inner">
					<div class="sws-inner">
						<p>Pastikan Anda tidak melewatkan kejadian menarik dengan mengikuti program buletin kami.
							Kami tidak melakukan spam.</p>
					</div>
					<div id="newsletter">
						<form class="newsletter" action="<?php echo $this->baseUrl();?>/email/subscribe-news-offers">
							<input type="email" placeholder="Masukkan Alamat Email Anda" name="SBEmail[email]">
							<div class="errorMessage" style="display:none;color:#E00000;"></div>
							<div class="successMessage" style="display:none;color:#008000;"></div>
							<br><br>
							<input id="subscribe" type="button" value="Subscribe" style="background: #333333;color: #ffffff;font-weight: bold;">
						</form>
					</div>
				</div>
			</div>
		</aside>
	</div>
	
	<!-- Banner Full -->
	<div class="big-banner">
		<a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/banner/3.jpg" class="img-responsive" alt=""/></a>
	</div>
	
	<!-- Footer -->
	<footer class="container">
		<div class="col-md-4 footer-widget footer-logo">
			<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="349" data-height="397" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
		</div>
		
		<div class="col-md-4 footer-widget p-news">
			<?php /*<h5>Most Commented</h5>*/ ?>
			<?php
			$footerNews = $this->getLatestNewsFooter(3);
			if(!empty($footerNews)){
			?>
			<ul>
				<?php foreach($footerNews as $fnews){?>
				<li>
					<img src="<?php echo $fnews->news_image_url;?>" alt=""/>
					<div class="pn-info">
						<?php /*<span>Politic</span>*/ ?>
						<h4><a href="<?php echo $fnews->url_link;?>"><?php echo $fnews->news_title;?></a></h4>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		
		<div class="col-md-4 footer-widget f-gallery">
			<h5>Gallery Index</h5>
			<ul>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/1.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/2.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/3.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/4.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/5.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/6.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/7.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/8.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="<?php echo $this->getBaseTheme('front','gazeta');?>images/aside/2/9.jpg" class="img-responsive" alt=""/></a></li>
			</ul>
		</div>
	</footer>
	
	<!-- Footer - Fixed -->
	<div class="footer-fixed">
		<div class="row">
			<div class="col-md-6">
				<ul class="footer-nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Archives</a></li>
					<li><a href="#">Contributors</a></li>
				</ul>
			</div>
			<div class="col-md-6">
				<p class="copy1"><?php echo str_replace("{year}",date("Y"),str_replace("{domain}","<a href=\"{$this->baseUrl()}\">bola433.com</a>",$this->Website->copyright));?> <a href="#" class="fa fa-arrow-up"></a></p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix space30"></div>

<!-- Javascript -->
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/jquery.min.js"></script>
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/vendor/slick/slick.js"></script>
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/jquery.nicescroll.js"></script>
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/main.js"></script>
<script src="<?php echo $this->getBaseTheme('front','gazeta');?>js/myJs.js"></script>

</body>
</html>
