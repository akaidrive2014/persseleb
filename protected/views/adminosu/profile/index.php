<div class="container-fluid">
	<div class="page_bar clearfix">
		<div class="row">
			<div class="col-md-12">
				<div class="media">
					<img class="img-thumbnail pull-left" src="<?php echo $this -> baseTheme(); ?>/admin/tisa/assets/img/avatars/avatar_5.jpg" alt="">
					<div class="media-body">
						<h1 class="page_title"><span class="text-muted">User:</span> <span class="display-name"><?php echo $profile->name;?></span></h1>
						<p>
							<span class="text-muted">Role:</span> <?php echo $profile->SBUsergroup->group_name;?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="user_profile">
						<div class="form-horizontal">
							<div class="tabbable tabs-right">
								<ul class="nav nav-tabs">

									<li class="active">
										<a data-toggle="tab" href="#profile_contact_pane" class="tab-default"><i class="glyphicon glyphicon-user"></i> Contact Info</a>
									</li>
									<li>
										<a data-toggle="tab" href="#profile_password_pane" class="tab-default"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
									</li>

								</ul>
								<div class="tab-content">

									<div id="profile_contact_pane" class="tab-pane form active">
										<?php $this -> renderPartial('_formProfile', array('profile' => $profile,'formname'=>'profile')); ?>
									</div>

									<div id="profile_password_pane" class="tab-pane form">
										<?php $this -> renderPartial('_formPassword',array('formcpassword'=>'formcpassword','changePassword'=>$changePassword)); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>