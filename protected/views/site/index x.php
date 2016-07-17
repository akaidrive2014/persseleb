<div id="line-page-body">
	<div class="line-wrap line-container line-no-sidebar">
		<div class="line-page-content">
			<div class="line-content line-page-content-inner">
				<?php
				$text = SBPage::model()->find(array('condition'=>'page_slug=:slug','params'=>array(':slug'=>"tagline2")))->page_content;
				if(!empty($text)){
				?>
				<div class="line-wrap line-row" style="margin-top:-40px;margin-bottom:30px;">
					<div class="line-tagline">
						<?php echo $text;?>
					</div>
				</div>
				<?php } ?>
				<?php if(!empty($this->getAllBannersliders())){?>
				<div class="line-wrap line-row">
					<div class="line-slider flexslider">
						<ul class="slides">
							<?php foreach($this->getAllBannersliders() as $banner){?>
							<li>
								<a href="<?php echo !empty($banner->url_link) ? $banner->url_link : "";?>"> 
									<img alt="img" src="<?php echo $this -> baseUrl(); ?>/assets/uploads/images/thumbnail/<?php echo $banner->banner_image;?>">
								</a>
                                <?php if(!empty($banner->banner_text)){?>
								<div class="line-caption">
									<h1 class="line-title"><?php echo $banner->banner_title;?></h1>
									<?php if(!empty($banner->url_link_live)){?> 
									<div class="line-link">
										<a class="line-btn green big" href="<?php echo $banner->url_link_live;?>" target="_blank">Launch</a>
									</div>
									<?php } ?>
									<div class="line-description">
										<p>
											<?php echo $banner->banner_text;?>
										</p>
									</div>
									<?php if(!empty($banner->url_link)){?>
									<div class="line-tags">
										<a href="<?php echo $banner->get_url_link;?>">Detail</a>
									</div>
									<?php } ?>
								</div>
                                <?php } ?>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				 
				<?php echo SBPage::model()->findByPk(13)->page_content;?>
				 
				<?php
				$LatestProjects = $this->getLatestProjects(12);
				if(!empty($LatestProjects)){
				?>
				<div class="line-wrap line-row">
					<div style="text-align:center;margin:50px 0 0 0;">
						<h3 class="line-title">Latest Projects</h3>
					</div>
					<div class="line-post-content line-portfolio line-portfolio-simple">
						<div class="line-content line-content-isotope line-list-article line-col-4">							 
							<?php foreach($LatestProjects as $latest){?>
							<article class="cat3 entry">
								<a title="<?php echo $latest->gallery_title;?>" class="line-thumb" href="<?php echo $this -> baseImageUpload().$latest->gallery_cover; ?>" data-lightbox="nivoLightbox"> <img src="<?php echo $this -> baseImageUpload().'thumbnail/'.$latest->gallery_cover; ?>" alt="thumb"> </a>
								<h3 class="line-title"><a href="<?php echo $latest->url_link;?>"><?php echo $latest->gallery_title;?></a></h3>
								<div class="incategory">
									&nbsp;
									<?php /*<a href="#">HTML5</a>, <a href="#">Mobile</a>*/ ?>
								</div>
							</article>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php
				$Feed = $this->getFeedShariveweb(12);
				if(!empty($Feed)){
				?>
				<div class="line-wrap line-row" style="margin-bottom:30px">
					<div style="text-align:center;">
						<h3 class="line-title" data-scrollreveal="enter bottom over 1s after 0.1s">Latest blog <a target="_blank" href="http://www.shariveweb.com">shariveweb.com</a></h3>
					</div>
					<div class="line-post-content line-blog line-blog-box">
						<div class="line-page-content">
							<div class="masonry-box">
							<?php
							

							$kolom = 2;    // Tentukan banyaknya kolom
							$no    = 1;    // Untuk penomoran

							$DATA = $Feed = $this->getFeedShariveweb(12);
							$i=0;

							foreach($DATA as $feed){
							// $data = mysql_fetch_array($sql);

							// % adalah operator modulus (sisa bagi)
							if($i % $kolom == 0) {

							echo "<article class=\"post item entry type-post line-thumb-right\" data-scrollreveal=\"enter bottom over 0.5s after 0.3s\">
							<div class=\"line-entry-wrap\">";

							}

							?>
							<div class="line-entry-content-wrap">
							<header class="entry-header">
							<?php /*<div class="line-entry-meta">
								 <span class="incategory"> <a href="#">Design</a>, <a href="#">Wordpress</a> </span>
								 </div>*/
 							?>
							<h1 class="entry-title"><a target="_blank" href="<?php echo $feed -> url; ?>"> <?php echo substr($feed -> title, 0, 32); ?>… </a></h1>
							</header>
							<div class="line-entry-content">
							<p>
							<?php echo substr($feed -> content, 0, 64); ?>…
							</p>
							</div>
							</div>
							<?php

							if (($i % $kolom) == ($kolom - 1) OR ($i + 1) == count($DATA)) {
								echo "</div>
								</article>";
							}
							$no++;
							$i++;
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<!--line-page-content-->
</div>
<!--end line-container-->
</div>
