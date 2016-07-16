<?php $form = $this -> beginWidget('CActiveForm', 
	array(
	'id' => $formname.'-form',
	//'enableAjaxValidation' => TRUE,
	'enableClientValidation' => TRUE,
	));
 ?>
 <div class="alert alert-success alert-dismissable fade in change-profile-success" style="display: none;">
		<button class="close" type="button">×</button>
			<strong>Your Profile</strong>
			has been changed successfully.
		</div>
<div class="form-group">
	<div class="col-md-12">
		<div class="heading_b">
			General Info
		</div>
	</div>
</div>
<div class="form-group">
	<label for="profile_city" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'name'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'name', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'name'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_city" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'usename'); ?>
	</label>
	<div class="col-md-10">
		<span class="form-control"><?php echo $profile->username;?></span>
	</div>
</div>
<div class="form-group">
	<label for="profile_country" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'email'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'email', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'email'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_country" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'mobile'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'mobile', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'mobile'); ?>
	</div>
</div>
<?php /*
	 <div class="form-group">
	 <label for="profile_country" class="col-md-2 control-label">Languange</label>
	 <div class="col-md-10">
	 <input type="radio" name="language" id="profile_country" class=""> Indonesia
	 <input type="radio" name="language" id="profile_country" class=""> English
	 </div>
	 </div>
	 */
?>
<div class="form-group">
	<div class="col-md-12">
		<div class="heading_b">
			Address
		</div>
	</div>
</div>
<div class="form-group">
	<label for="profile_city" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'city'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'city', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'city'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_country" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'country'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'country', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'country'); ?>
	</div>
</div>
<div class="form-group">
	<label for="profile_street" class="col-md-2 control-label">
		<?php echo $form -> labelEx($profile, 'street'); ?>
	</label>
	<div class="col-md-10">
		<?php echo $form -> textField($profile, 'street', array('class' => 'form-control')); ?>
		<?php echo $form -> error($profile, 'street'); ?>
	</div>
</div>
<hr>
<div class="text-center">
	<input type="button"class="btn btn-success" id="saveProfile" value="Save profile">
</div>
<?php $this -> endWidget(); ?>
<script>
	$(function(){
		$('.close').click(function(){
			$('.alert').slideUp('slow');
		});
		$("#saveProfile").click(function(){
			$("#saveProfile").attr({
				'disabled' : true,
				'value':'Saving profile...'
			});
			var formProfile = $("#<?php echo $formname;?>-form");
			$.post(formProfile.attr('action'),formProfile.serialize(),function(response){
				if(response.success==true){
					var destn = $('#main_wrapper').offset().top;
					$('html, body').animate({scrollTop: (destn - 40)}, 'slow');
					$(".change-profile-success").slideDown('slow',function(){
						$(".display-name").html($('#SBUser_name').val());
					});
				}else{
					if(response.SBUser_name){
						$("#SBUser_name").addClass('error');
						$("#SBUser_name_em_").html(response.SBUser_name).show();
					}else{
						$("#SBUser_name").removeClass('error');
						$("#SBUser_name_em_").html('').hide();
					}
					if(response.SBUser_email){
						$("#SBUser_email").addClass('error');
						$("#SBUser_email_em_").html(response.SBUser_email).show();
					}else{
						$("#SBUser_email").removeClass('error');
						$("#SBUser_email_em_").html('').hide();
					}
					if(response.SBUser_mobile){
						$("#SBUser_mobile").addClass('error');
						$("#SBUser_mobile_em_").html(response.SBUser_mobile).show();
					}else{
						$("#SBUser_mobile").removeClass('error');
						$("#SBUser_mobile_em_").html('').hide();
					}
				}
				$("#saveProfile").attr({
					'disabled' : false,
					'value':'Save profile'
				});
			},'json');
		});
	});
</script>