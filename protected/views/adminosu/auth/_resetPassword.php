<div class="login_container form">
	<form id="change_password_form" action="<?php echo Yii::app() -> getRequest() -> getRequestUri(); ?>" method="get">
		<h1 class="login_heading">Change Password</h1>
		<div class="alert alert-success alert-dismissable fade in reset-code-success" style="display: none;">
		<button class="close" data-dismiss="alert" type="button">×</button>
			<strong>Your Password</strong>
			has been changed successfully, Please <a href="<?php echo $this->baseUrl().'/'.$this->admin;?>" class="alert-link">click here</a> to login.
		</div>
		<div class="form-group">
			<label for="login_username">New Password <span class="required">*</span></label>
			<input type="password" name="SBUser[input_password]" class="form-control input-lg" value="" id="forgot_newpassword">
			<div class="errorMessage" id="newPassword"></div>
		</div>
		<div class="form-group">
			<label for="login_password">Re-Type New Password</label>
			<input type="password" name="SBUser[retypePassword]" class="form-control input-lg" value="" id="forgot_retype_newpassword">
			<div class="errorMessage" id="reTypeResetPassword"></div>
		</div>
		<div class="submit_section">
			<input type="button" class="btn btn-lg btn-success btn-block" id="changePassword" value="Change Your Password">
		</div>
	</form>
</div>
<script>
	$(function(){
		$("#changePassword").click(function(){
			$("#changePassword").attr({
				'disabled':true,
				'value':'Changing Your Password...',
			});
			var formChange = $("#change_password_form");
			$.post(formChange.attr('action'),formChange.serialize(),function(response){
				if(response.success==false){
					$(".errorMessage").empty();
					$("#reTypeResetPassword").addClass('error');
					$("#reTypeResetPassword").html(response.message);
				}
				if(response.success==true){
					$(".reset-code-success").slideDown('slow');
					$(".errorMessage").empty();
					$(".error").removeClass('error');
					formChange[0].reset();
				}else{
					if(response.SBUser_input_password){
						$("#forgot_newpassword").addClass('error');
						$("#newPassword").html(response.SBUser_input_password);
					}else{
						$("#forgot_newpassword").removeClass('error');
						$("#newPassword").empty();
					}
				}
				$("#changePassword").attr({
					'disabled':false,
					'value':'Change Your Password',
				});
			},'json');
		});
		
	});
</script>