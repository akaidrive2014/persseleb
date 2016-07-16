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
								<?php if($this->isRights('users')){?>
								<li class="active">
									<a data-toggle="tab" href="#wd_a"><i class="glyphicon glyphicon-user"></i> Users</a>
								</li>
								<?php } ?>
								<?php if($this->isRights('privileges')){?>
								<li>
									<a data-toggle="tab" href="#pf_a"><i class="glyphicon glyphicon-lock"></i> Privileges</a>
								</li>
								<?php } ?>
							</ul>
							<div class="tab-content" id="tabs_content_a">
								<?php if($this->isRights('users')){?>
								<div id="wd_a" class="tab-pane fade in active">
									<?php
										$this->renderPartial("users/_UserList",array('Users'=>$Users));
									?>
								</div>
								<?php } ?>
								<?php if($this->isRights('privileges')){?>
								<div id="pf_a" class="tab-pane fade">
									<?php 
										$this->renderPartial("usergroups/_UserGroupsList",array('UserGroups'=>$UserGroups));
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