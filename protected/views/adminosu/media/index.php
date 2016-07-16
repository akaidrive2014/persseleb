<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $title;?>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs" id="tabs_a">
								<?php if($this->isRights('galleries')){?>
								<li class="active">
									<a data-toggle="tab" href="#td_a"><i class="ion-grid"></i> Galleries Collection</a>
								</li>
								<?php } ?>
								<?php if($this->isRights('images')){?>
								<li>
									<a data-toggle="tab" href="#tc_a"><i class="ion-images"></i> Images Collection</a>
								</li>
								<?php } ?>
								<?php if($this->isRights('videos')){?>
								<li>
									<a data-toggle="tab" href="#nl_a"><i class="ion-social-youtube-outline"></i> Videos Collection</a>
								</li>
							 	<?php } ?>
							</ul>
							<div class="tab-content" id="tabs_content_a">
								<?php if($this->isRights('galleries')){?>
								<div id="td_a" class="tab-pane fade in active">
									 <?php 
										$this->renderPartial("galleries/_GalleriesList",array('Gallery'=>$Gallery));
									?>
								</div>
								<?php } ?>
								<?php if($this->isRights('images')){?>
								<div id="tc_a" class="tab-pane fade">
									<?php 
										$this->renderPartial("images/_ImagesList",array('Image'=>$Image));
									?>
								</div>
								<?php } ?>
								<?php if($this->isRights('videos')){?>
								<div id="nl_a" class="tab-pane fade">
									<?php 
										$this->renderPartial("videos/_VideosList",array('Video'=>$Video));
									?>
								</div>
								<?php } ?>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>