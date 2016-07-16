<div class="login_container form">
	<form id="login_form" action="<?php echo $this->baseUrl().'/'.$this->admin;?>/login" method="get">
		<h1 class="login_heading">Login</h1>
		<div class="form-group">
			<label for="login_username">Username <span class="required">*</span></label>
			<input type="text" name="AdminLoginForm[username]" class="form-control input-lg" value="" id="login_username">
			<div id="login_username_error" class="errorMessage"></div>
		</div>
		<div class="form-group">
			<label for="login_password">Password <span class="required">*</span></label>
			<input type="password" name="AdminLoginForm[password]" class="form-control input-lg" value="" id="login_password">
			<div id="login_password_error" class="errorMessage"></div>
			 
		</div>
		<div class="form-group">
			<?php echo CActiveForm::checkBox($model,'rememberMe',array('style'=>'float:left;')); ?>
			<?php echo CActiveForm::label($model,'rememberMe',array('style'=>'float:left;')); ?>
			<?php //echo $form->error($model,'rememberMe'); ?>
			 
		</div>
		<div class="form-group">
			<div class="clearfix"></div>
			<br>
			<span class="help-block" style="padding-left: 0px;"> <a href="#" class="open_forgot_form">Forgot password?</a> </span>
		</div>	
		<div class="submit_section">
			<input type="button" class="btn btn-lg btn-success btn-block" id="login" value="Click me to login">
		</div>
	</form>
	<form id="forgot_form" action="<?php echo $this->baseUrl().'/'.$this->admin;?>/send-code-to-reset-password" style="display:none">
		<h1 class="login_heading">Forget Password</h1>
		<div class="alert alert-success alert-dismissable fade in reset-code-success" style="display: none;">
		<button class="close" data-dismiss="alert" type="button">×</button>
			<strong>Reset Password Code</strong>
			has been sent to your email, Please go to your email and follow the link.
		</div>
		<div class="form-group">
			<label for="register_username">Username <span class="required">*</span></label>
			<input type="text" name="SBUser[username]" class="form-control input-lg" id="forgot_username">
			<div id="forgot_username_error" class="errorMessage"></div>
		</div>
		<div class="form-group">
			<label for="register_email">Email <span class="required">*</span></label>
			<input type="text" name="SBUser[email]" class="form-control input-lg" id="forgot_email">
			<div id="forgot_email_error" class="errorMessage"></div>
			
		</div>
		<div class="form-group">
			<div class="clearfix"></div>
			<br>
			<span class="help-block" style="padding-left:0px;"> <a href="#" class="open_login_form">Remember password?</a> </span>
		</div>
		<?php /*
			 <div class="form-group">
			 <label class="checkbox-inline"><input type="checkbox" name="register_terms" id="register_terms"> Agree to <a href="javascript:void(0)" data-toggle="modal" data-target="#terms_modal">terms&conitions</a></label>
			 </div>
			 */
		?>
		<div class="submit_section">
			<input type="button" class="btn btn-lg btn-success btn-block" id="getreset" value="Get Reset Password Code">
		</div>
	</form>
</div>
<script>
	$(function(){
		$("#getreset").click(function(){
			$("#getreset").attr({
				'disabled':true,
				'value':'Reset code is being sent to your email...',
			});
			var forgotForm = $('#forgot_form');
			$.post(forgotForm.attr('action'),forgotForm.serialize(),function(response){
				if(response.success==true){
					$(".reset-code-success").slideDown('slow');
					forgotForm[0].reset();
					$("#forgot_username").removeClass('error');
					$("#forgot_email").removeClass('error');
					$("#forgot_email_error").empty();
				}else{
					$("#forgot_username").addClass('error');
					$("#forgot_email").addClass('error');
					$("#forgot_email_error").html(response.message);
				}
				$("#getreset").attr({
					'disabled':false,
					'value':'Get Reset Password Code',
				});
			},'json');
		});
		
		
		$("#login").click(function(){
			$("#login").attr({
				'disabled':true,
				'value':'Please wait...',
			});
			var formLogin = $('#login_form');
			$.post(formLogin.attr('action'),formLogin.serialize(),function(response){
				if(response.success==true){
					$("#login").attr({
						'value':'Redirecting...'
					});
					window.location.href='<?php echo $this->baseUrl().'/'.$this->admin;?>/dashboard';
					return false;
				}else{
					if(response.AdminLoginForm_username){
						$("#login_username").addClass('error');
						$("#login_username_error").html(response.AdminLoginForm_username);
					}else{
						$("#login_username").removeClass('error');
						$("#login_username_error").empty();
					}
					if(response.AdminLoginForm_password){
						$("#login_password").addClass('error');
						$("#login_password_error").html(response.AdminLoginForm_password);
					}else{
						$("#login_password").removeClass('error');
						$("#login_password_error").empty();
					}
					if(response.AdminLoginForm_passwordx){
						$("#login_username").addClass('error');
						$("#login_password").addClass('error');
						$("#login_password_error").html(response.AdminLoginForm_passwordx);
					}
				}
				$("#login").attr({
					'disabled':false,
					'value':'Click me to login',
				});
			},'json');
		});
	});
</script>