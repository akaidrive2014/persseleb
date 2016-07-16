<?php $form = $this -> beginWidget('CActiveForm', 
	array(
	'id' => $formcpassword.'-form',
	//'enableAjaxValidation' => TRUE,
	'enableClientValidation' => TRUE,
	));
 ?>
 <div class="alert alert-success alert-dismissable fade in change-password-success" style="display: none;">
		<button class="close" type="button">×</button>
			<strong>Your Password</strong>
			has been changed successfully. Please <a href="<?php echo $this->baseUrl().'/'.$this->admin;?>/logout" class="alert-link">click here</a> to re-login.
		</div>
<div class="form-group">
	<div class="col-md-12">
		<div class="heading_b">
			Password
		</div>
	</div>
</div>
<div class="form-group">
	<label for="profile_email" class="col-md-2 control-label">
		<?php echo $form -> labelEx($changePassword, 'oldPassword',array('style'=>'width: 132px;')); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> passwordField($changePassword, 'oldPassword', array('class' => 'form-control')); ?>
		<?php echo $form -> error($changePassword, 'oldPassword'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_skype" class="col-md-2 control-label">
		<?php echo $form -> labelEx($changePassword, 'newPassword',array('style'=>'width: 132px;')); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> passwordField($changePassword, 'newPassword', array('class' => 'form-control')); ?>
		<?php echo $form -> error($changePassword, 'newPassword'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_email" class="col-md-2 control-label">
		<?php echo $form -> labelEx($changePassword, 'compareNewPassword',array('style'=>'width: 132px;')); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> passwordField($changePassword, 'compareNewPassword', array('class' => 'form-control')); ?>
		<?php echo $form -> error($changePassword, 'compareNewPassword'); ?>
	</div>
</div>
<hr>
<div class="text-center">
	<input type="button"class="btn btn-success" id="changePassword" value="Save Change Password">
</div>
<?php $this -> endWidget(); ?>
<script>
	$(function(){
		$('.close').click(function(){
			$('.alert').slideUp('slow');
		});
		$("#changePassword").click(function(){
			$("#changePassword").attr({
				'disabled' : true,
				'value':'Saveing Change Password...'
			});
			var formCPassword = $("#<?php echo $formcpassword;?>-form");
			$.post(formCPassword.attr('action'),formCPassword.serialize(),function(response){
				if(response.success==true){
					var destn = $('#main_wrapper').offset().top;
					$('html, body').animate({scrollTop: (destn - 40)}, 'slow');
					$(".change-password-success").slideDown('slow',function(){
					});
				}else{
					if(response.ChangePassword_oldPassword){
						$("#ChangePassword_oldPassword").addClass('error');
						$("#ChangePassword_oldPassword_em_").html(response.ChangePassword_oldPassword).show();
					}else{
						$("#ChangePassword_oldPassword").removeClass('error');
						$("#ChangePassword_oldPassword_em_").html('').hide();
					}
					if(response.ChangePassword_newPassword){
						$("#ChangePassword_newPassword").addClass('error');
						$("#ChangePassword_newPassword_em_").html(response.ChangePassword_newPassword).show();
					}else{
						$("#ChangePassword_newPassword").removeClass('error');
						$("#ChangePassword_newPassword_em_").html('').hide();
					}
					if(response.ChangePassword_compareNewPassword){
						$("#ChangePassword_compareNewPassword").addClass('error');
						$("#ChangePassword_compareNewPassword_em_").html(response.ChangePassword_compareNewPassword).show();
					}else{
						$("#ChangePassword_compareNewPassword").removeClass('error');
						$("#ChangePassword_compareNewPassword_em_").html('').hide();
					}
				}
				$("#changePassword").attr({
					'disabled' : false,
					'value':'Save Change Password'
				});
			},'json');
		});
	});
</script>