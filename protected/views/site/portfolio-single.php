<div id="line-page-title">
	<div class="line-wrap">
		<div class="line-page-title-inner">
			<div style="background:url(<?php echo $this -> baseTheme(); ?>/front/ostar/assets/img/sample/portfolio/6.jpg) center center; padding:150px 0">
				<div class="line-title-captions" data-scrollreveal="enter top over 0.5s after 0.3s">
					<h1 class="line-entry-title">My Portfolio</h1>
				</div>
				<ul class="line-breadcrumbs" data-scrollreveal="enter bottom over 0.5s after 0.4s">
					<li>
						<a href="<?php echo $this->baseUrl();?>">Home</a>
					</li>
					<li>
						Portfolio
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--end line-wrap-->
</div>
<div id="line-page-body">
	<div class="line-wrap line-portfolio line-container line-portfolio-simple line-no-sidebar">
		<div class="line-page-content" id="portfoo">
			<div class="line-content line-page-content-inner">
				<article class="line-content line-content-single-portfolio">
					<div class="one-fourth line-meta">
						<h1 class="line-title"><?php echo $portfolio->gallery_title;?></h1>
						<?php /*
						<div class="line-author">
							<a href="#">by admin</a>
						</div>*/ ?>
						
						<div class="line-link">
							<?php if(!empty($portfolio->url_live)){?>
							<a class="line-btn green big" href="<?php echo $portfolio->url_live;?>" target="_blank">Launch</a>
							<?php } ?>
							<a data-lightbox="nivoLightbox" class="line-btn green big" href="<?php echo $this -> baseImageUpload().$portfolio->gallery_cover; ?>"><i class="fa fa-expand"></i> Screen</a>
						</div>
						
						<div class="line-description">
							<?php echo $portfolio->seo_description;?>
						</div>
						<div class="line-tags">
							&nbsp;
							<?php /*
							<a href="#">Wordpress</a>
							<a href="#">Sky</a>
							<a href="#">Cloud</a>
							*/ ?>
						</div>
					</div>
					<div class="three-fourth last line-portfolio-media">
						<div class="flexslider">
							<?php if(!empty($this->getImageByGalleryID($portfolio->gallery_id))){?>
							<ul class="slides">
								<?php foreach($this->getImageByGalleryID($portfolio->gallery_id) as $image){?>
								<li>
									<img src="<?php echo $this -> baseImageUpload().$image->image; ?>" alt="Image">
								</li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div>
					</div>
				</article>
				<?php /*
				<a href="#" class="line-single-nav post-prev"> <i class="fa fa-angle-left"></i>
				<div class="post-entry">
					<div class="post-entry-inner">
						<h3 class="line-title">Single Portfolio Post: Prev</h3>
						<div class="img">
							<img src="<?php echo $this -> baseTheme(); ?>/front/ostar/assets/img/sample/blog/small/7.jpg" alt="thumb" width="60">
						</div>
					</div>
				</div> </a> */ ?>
				<?php /*
				<a href="#" class="line-single-nav post-next"> <i class="fa fa-angle-right"></i>
				<div class="post-entry">
					<div class="post-entry-inner">
						<div class="img">
							<img src="<?php echo $this -> baseTheme(); ?>/front/ostar/assets/img/sample/blog/small/9.jpg" alt="thumb" width="60">
						</div>
						<h3 class="line-title">Single Portfolio Post: Next</h3>
					</div>
				</div> </a>
				*/ ?>
				<?php 
				$Others = $this->getRandomPortofolio(8);
				if(!empty($Others)){
				?>
				<div class="line-other-post">
					<h3 class="line-title">You may also want to see</h3>
					<div class="line-content line-content-isotope line-list-article line-col-4">
						<?php foreach($Others as $index=>$other){?>
						<article class="cat<?php echo $index;?> entry">
							<a title="<?php echo $other->gallery_title;?>" class="line-thumb" href="<?php echo $this -> baseImageUpload().$other->gallery_cover; ?>" data-lightbox="nivoLightbox"> <img src="<?php echo $this -> baseImageUpload().'thumbnail/'.$other->gallery_cover; ?>" alt="thumb"> </a>
							<h3 class="line-title"><a href="<?php echo $other->url_link;?>"><?php echo $other->gallery_title;?></a></h3>
							<div class="incategory">
								&nbsp;
								<?php /*<a href="#">HTML5</a>, <a href="#">Mobile</a>*/ ?>
							</div>
						</article>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<!--line-page-content-->
	</div>
	<!--end line-portfolio-->
</div>