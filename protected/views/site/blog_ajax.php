<?php if(!empty($Posts)){?>
		<?php foreach($Posts as $post){?>
		<li>
			<div class="col-md-12">
				<a href="<?php echo $post->url_link;?>">
					<?php if(!empty($post->news_image_url)){?>
						<img src="<?php echo $post->news_image_url;?>" class="img-responsive" alt=""/>
					<?php }else{ ?>
						<img src="<?php echo $this -> getBaseTheme('front', 'gazeta'); ?>img/football.jpg" class="img-responsive" alt=""/>
					<?php } ?>
				</a>
				<div class="rp-inner">
					<?php /*<span class="rp-cat">Uncategorized</span>*/ ?>
					<h4><a href="<?php echo $post -> url_link; ?>"><?php echo $post -> news_title; ?></a></h4>
					<a href="#" class="rp-more">Read more <em>&#8594;</em></a>
				</div>
			</div>
		</li>
		<?php } ?>
<?php } ?>