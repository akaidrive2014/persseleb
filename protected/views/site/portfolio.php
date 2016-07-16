<div id="line-page-title">
	<div class="line-wrap">
		<div class="line-page-title-inner">
			<div style="background:url('<?php if (empty($banner->banner_image)) { ?> <?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/portfolio/1.jpg <?php }else{?><?php echo $this -> baseUrl(); ?>/assets/uploads/images/thumbnail/<?php echo $banner->banner_image;?><?php } ?>') center center; padding:150px 0">
				<div class="line-title-captions" data-scrollreveal="enter top over 0.5s after 0.3s">
					<h1 class="line-entry-title"><?php echo empty($banner->banner_title) ? 'Portfolio':$banner->banner_title;?></h1>
				</div>
				<ul class="line-breadcrumbs" data-scrollreveal="enter bottom over 0.5s after 0.4s">
					<li>
						<a href="<?php echo $this->baseUrl();?>">Home</a>
					</li>
					<li>
						<?php echo empty($banner->banner_title) ? 'Portfolio':$banner->banner_title;?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--end line-wrap-->
</div>
<div id="line-page-body">
	<div class="line-wrap line-portfolio line-container line-portfolio-simple line-no-sidebar">
		<div class="line-page-content">
			<div class="line-content line-page-content-inner">
				<h3 class="line-title">Portfolio</h3>
				<?php /*
				<ul class="line-filter">
					<li>
						<a data-filter="*" href="#" class="selected">All</a>
					</li>
					<li>
						<a data-filter=".cat1" href="#">jQuery</a>
					</li>
					<li>
						<a data-filter=".cat2" href="#">Design</a>
					</li>
					<li>
						<a data-filter=".cat3" href="#">HTML5</a>
					</li>
					<li>
						<a data-filter=".cat4" href="#">Mobile</a>
					</li>
				</ul>*/ ?>
				<?php if(!empty($Images)){?>
				<div class="line-content line-content-isotope line-list-article line-col-4"> 
					<?php foreach($Images as $index=>$image){?>
					<article class="cat<?php echo $index;?> entry">
						<a title="<?php echo $image->gallery_title;?>" class="line-thumb" href="<?php echo $this -> baseImageUpload().$image->gallery_cover; ?>" data-lightbox="nivoLightbox"> 
							<img src="<?php echo $this -> baseImageUpload().'thumbnail/'.$image->gallery_cover; ?>" alt="thumb"> 
						</a>
						<h3 class="line-title"><a href="<?php echo $image->url_link;?>"><?php echo $image->gallery_title;?></a></h3>
						<div class="incategory">
							&nbsp;
							<?php /*<a href="#">HTML5</a>, <a href="#">Mobile</a>*/?>
						</div>
					</article>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<!--line-page-content-->
	</div>
	<!--end line-blog-->
</div>