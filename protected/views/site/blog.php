<style>
	.page-nav ul li:first-child,.page-nav ul li:last-child{
		display:none;
	}
</style>
<div class="col-md-8 blog-single">
	<?php if(!empty($Posts)){?>
	<h3>
		<?php $Top = $this->getNewsTopPopular();?>
		<a href="<?php echo $Top->url_link;?>" title="<?php echo $Top->news_title;?>"><?php echo $Top->news_title;?></a>
	</h3>
	<div class="related-posts related-posts-cat">
		<h5>News Today<span><i class="fa fa-angle-down"></i></span></h5>
		<ul>
			<?php foreach($Posts as $post){?>
			<li>
				<?php /*
				<div class="col-md-3">
					<div class="rp-date">
						<span><?php echo date("F",strtotime($post->news_date));?></span>
						<?php echo date("d",strtotime($post->news_date));?>
						<span><em>/</em> <?php echo date("Y",strtotime($post->news_date));?></span>
					</div>
				</div>*/ ?>
				<div class="col-md-12"><?php /*9*/ ?>
					<a href="<?php echo $post->url_link;?>">
						<?php if(!empty($post->news_image_url)){?>
							<img src="<?php echo $post->news_image_url;?>" class="img-responsive" alt=""/>
						<?php }else{ ?>
							<img src="<?php echo $this -> getBaseTheme('front', 'gazeta'); ?>img/football.jpg" class="img-responsive" alt=""/>
						<?php } ?>
					</a>
					<div class="rp-inner">
						<?php /*<span class="rp-cat">Uncategorized</span>*/ ?>
						<h4 style="margin-bottom:0px;"><a href="<?php echo $post->url_link;?>"><?php echo $post->news_title;?></a></h4>
						<p><?php //echo substr(strip_tags($post->news_content),0,90);?></p>
						<a href="<?php echo $post->url_link;?>" class="rp-more">Read more <em>&#8594;</em></a>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
		<img src="<?php echo $this -> getBaseTheme('front', 'gazeta'); ?>img/icon-loading-large.png" class="img-responsive loader" alt="" style="display:none;width: 33px; margin: auto auto 30px;" />
		<div class="loadMore" title="Click to see other news"></div>
	</div>
	<?php } ?>
</div>
<div id="sumPageButtons" style="display: none"><?php echo $Pages->pageCount;?></div>