<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Setting
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs" id="tabs_a">
								<?php if($this->isRights('websitedata')){?>
								<li class="active">
									<a data-toggle="tab" href="#wd_a"><i class="glyphicon glyphicon-globe"></i> Website Data</a>
								</li>
								<?php } ?>
								<?php if($this->isRights('smtpmail')){?>
								<li>
									<a data-toggle="tab" href="#pf_a"><i class="glyphicon glyphicon-envelope"></i> Smtp Mail</a>
								</li>
								<?php } ?>
								<li>
									<a data-toggle="tab" href="#tm_a"><i class="glyphicon glyphicon-th"></i> Modules</a>
								</li>
							</ul>
							<div class="tab-content" id="tabs_content_a">
								<?php if($this->isRights('websitedata')){?>
								<div id="wd_a" class="tab-pane fade in active">
									<?php
									$this->renderPartial('_formWebsiteData',array('config'=>$config));
									?>
								</div>
								<?php } ?>
								<?php if($this->isRights('smtpmail')){?>
								<div id="pf_a" class="tab-pane fade">
									<?php 
									$this->renderPartial('_formSMTP',array('smtp'=>$smtp));
									?>
								</div>
								<?php } ?>
								<div id="tm_a" class="tab-pane fade">
									<?php 
									$this->renderPartial('_modules',array(
											'pages'=>$this->getAllPages(),
											'modules'=>$this->getAllModules(),
											'contact'=>$contact = json_decode($config->contact)->contact,
										)
									);
									?>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>