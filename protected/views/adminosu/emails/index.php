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
								<?php if($this->isRights('templatesDefault')){?>
								<li class="active">
									<a data-toggle="tab" href="#td_a"><i class="ion-email"></i> Templates Default</a>
								</li>
								<?php } ?>
							<!--	
								<li>
									<a data-toggle="tab" href="#tc_a"><i class="ion-ios7-email"></i> Templates Collection</a>
								</li>
								<li>
									<a data-toggle="tab" href="#nl_a"><i class="ion-ios7-paperplane-outline"></i> Newsletter</a>
								</li>
							-->
							</ul>
							<div class="tab-content" id="tabs_content_a">
								<?php if($this->isRights('templatesDefault')){?>
								<div id="td_a" class="tab-pane fade in active">
									<?php
										$this->renderPartial("templates_default/admin",array('templateDefault'=>$templateDefault));
									?>
								</div>
								<?php } ?>
								<!--
								<div id="tc_a" class="tab-pane fade">
									<?php 
										//$this->renderPartial("usergroups/_UserGroupsList",array('UserGroups'=>$UserGroups));
									?>
								</div>
								<div id="nl_a" class="tab-pane fade">
									<?php 
										//$this->renderPartial("usergroups/_UserGroupsList",array('UserGroups'=>$UserGroups));
									?>
								</div>
								-->
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>