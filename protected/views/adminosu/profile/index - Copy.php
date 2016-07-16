<div class="container-fluid">
	<div class="page_bar clearfix">
		<div class="row">
			<div class="col-md-12">
				<div class="media">
					<img class="img-thumbnail pull-left" src="<?php echo $this->baseTheme();?>/admin/tisa/assets/img/avatars/avatar_5.jpg" alt="">
					<div class="media-body">
						<h1 class="page_title"><span class="text-muted">User:</span> Walton Zieme</h1>
						<p>
							<span class="text-muted">Role:</span> SuperAdmin
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
						<form class="form-horizontal">
							<div class="tabbable tabs-right">
								<ul class="nav nav-tabs">
									<li class="active">
										<a data-toggle="tab" href="#profile_general_pane" class="tab-default">General Info</a>
									</li>
									<li>
										<a data-toggle="tab" href="#profile_contact_pane" class="tab-default">Contact Info</a>
									</li>
									<li>
										<a data-toggle="tab" href="#profile_other_pane" class="tab-default">Other Info</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="profile_general_pane" class="tab-pane active">
										<div class="form-group">
											<label for="profile_username" class="col-md-2 control-label">Username</label>
											<div class="col-md-10">
												<input type="text" id="profile_username" class="form-control" value="walton_zieme">
											</div>
										</div>
										<div class="form-group">
											<label for="user_fname" class="col-md-2 control-label">First Name</label>
											<div class="col-md-10">
												<input type="text" id="user_fname" class="form-control" value="Walton">
											</div>
										</div>
										<div class="form-group">
											<label for="user_lname" class="col-md-2 control-label">Last Name</label>
											<div class="col-md-10">
												<input type="text" id="user_lname" class="form-control" value="Zieme">
											</div>
										</div>
										<div class="form-group">
											<label for="user_password" class="col-md-2 control-label">Password</label>
											<div class="col-md-10">
												<input type="password" id="user_password" class="form-control" value="password">
											</div>
										</div>
									</div>
									<div id="profile_contact_pane" class="tab-pane">
										<div class="form-group">
											<div class="col-md-12">
												<div class="heading_b">
													Address
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="profile_city" class="col-md-2 control-label">City</label>
											<div class="col-md-10">
												<input type="text" id="profile_city" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="profile_country" class="col-md-2 control-label">Country</label>
											<div class="col-md-10">
												<input type="text" id="profile_country" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="profile_street" class="col-md-2 control-label">Street</label>
											<div class="col-md-10">
												<input type="text" id="profile_street" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="heading_b">
													Social
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="profile_email" class="col-md-2 control-label">Email</label>
											<div class="col-md-10">
												<input type="text" id="profile_email" class="form-control" value="lockman.ignacio@hotmail.com">
											</div>
										</div>
										<div class="form-group">
											<label for="profile_skype" class="col-md-2 control-label">Skype</label>
											<div class="col-md-10">
												<input type="text" id="profile_skype" class="form-control" value="walton_zieme">
											</div>
										</div>
									</div>
									<div id="profile_other_pane" class="tab-pane">
										<div class="form-group">
											<label for="user_languages" class="col-md-2 control-label">Signature</label>
											<div class="col-md-10">
												<textarea name="user_signature" id="user_signature" cols="30" rows="4" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="user_languages" class="col-md-2 control-label">Languages</label>
											<div class="col-md-10">
												<input type="text" name="user_languages" id="user_languages" class="form-control" value="English,French">
											</div>
										</div>
										<div class="form-group">
											<label for="user_languages" class="col-md-2 control-label">Newsletter</label>
											<div class="col-md-10">
												<input type="checkbox" class="bs_switch" data-on-color="success" data-on-text="Yes" data-off-text="No">
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="text-center">
									<button class="btn btn-success">
										<i class="fa fa-save"></i> Save profile
									</button>
									<button class="btn btn-default">
										<i class="fa fa-trash-o fa-lg"></i> Delete
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>