<style>
	.col-md-9 img {max-width: 570px;}
</style>
<div class="col-md-8 blog-single">
	<div class="bs-meta">
		<?php /*<span class="bs-cat">Uncategorized</span>
		
		<span class="bs-comments"><a href="#"><i class="fa fa-comments-o"></i> 4 Comments</a> <em></em> <a href="#"><i class="fa fa-heart-o"></i> 23 Likes</a></span>
		*/ ?> 
	</div>
	<h3><?php echo $post->news_title;?></h3>
	<div class="row">
		<div class="col-md-3 bs-aside">
			<?php /*<img alt="" src="images/xtra/2.png">
			<h6>John Smith</h6>*/ ?>
			<div class="sep1"></div>
			<div class="space10"></div>
			<div class="rp-date">
				<span><?php echo date("F",strtotime($post->news_date));?></span>
				<?php echo date("d",strtotime($post->news_date));?>
				<span><em>/</em> <?php echo date("Y",strtotime($post->news_date));?></span>
			</div>
			<div class="space30"></div>
			<div class="sep1"></div>
			<div class="space20"></div>
			<?php /*<em class="share-count">10K SHARE</em>*/ ?>
			<span class="bsa-social"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-plus"></i></a> </span>
		</div>

		<div class="col-md-9">
			<?php if(!empty($post->news_image_url)){?>
			<div class="img-w-caption">
				<a href="<?php echo $post->url_link;?>">
				<img alt="" class="img-responsive" src="<?php echo $post->news_image_url;?>">
				</a>
				<?php /*<span>Example : This is image caption fo sample</span>*/?>
			</div>
			<?php } ?>

			<?php echo strip_tags($post->news_content,'<a><b><p><u><i><strong><div><iframe><img>');?>

			<div class="bg-share">
				<div class="row">
					<div class="col-md-8">
						<span>Sumber : <?php echo $post->source;?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Related Posts -->
	<?php
	$Random = $this->getRandonNews();
	if(!empty($Random)){
	?>
	<div class="related-posts">
		<h5>Related Post</h5>
		<ul>
			<?php foreach($Random as $news){?>
			<li>
				<div class="col-md-3">
					<div class="rp-date">
						<span><?php echo date("F",strtotime($news->news_date));?></span>
						<?php echo date("d",strtotime($news->news_date));?>
						<span><em>/</em> <?php echo date("Y",strtotime($news->news_date));?></span>
					</div>
				</div>
				<div class="col-md-9">
					<img alt="" class="img-responsive" src="<?php echo $news->news_image_url;?>">
					<div class="rp-inner">
						<h4><a href="<?php echo $news->url_link;?>"><?php echo $news->news_title;?></a></h4>
						<a class="rp-more" href="<?php echo $news->url_link;?>">Read more <em>→</em></a>
					</div>
				</div>
			</li>

			<?php } ?>

		</ul>
	</div>
	<?php } ?>
	<!-- Comments -->
	 
</div>