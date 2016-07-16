<div id="line-page-title">
	<div class="line-wrap">
		<div class="line-page-title-inner">
			<div style="background:url('<?php if (empty($banner->banner_image)) { ?> <?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/bg-elements.jpg <?php }else{?><?php echo $this -> baseUrl(); ?>/assets/uploads/images/thumbnail/<?php echo $banner->banner_image;?><?php } ?>') center center; padding:150px 0">
				<div class="line-title-captions" data-scrollreveal="enter top over 0.5s after 0.3s">
					<h1 class="line-entry-title"><?php echo empty($banner->banner_title) ? $page->page_name:$banner->banner_title;?></h1>
				</div>
				<ul class="line-breadcrumbs" data-scrollreveal="enter bottom over 0.5s after 0.4s">
					<li>
						<a href="<?php echo $this->baseUrl();?>">Home</a>
					</li>
					<li>
						<?php echo $page->page_name;?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--end line-wrap-->
</div>
<div id="line-page-body">
	<div class="line-wrap line-container line-no-sidebar">
		<div class="line-page-content">
			<div class="line-content line-page-content-inner">
				<div class="line-wrap line-row" style="margin-bottom:20px">
					<?php echo $page->page_content;?>
				</div>
			</div>
		</div>
		<!--line-page-content-->
	</div>
	<!--end line-container-->
</div>