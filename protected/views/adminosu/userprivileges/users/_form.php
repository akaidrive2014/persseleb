<?php $this->avoidDoubleLoadJS(); ?>
<div class="panel panel-default">
	<div class="panel-heading"> <?php echo $title;?> </div>
	<div class="panel-body form">

		<?php $form = $this -> beginWidget('CActiveForm', array('id' => $this->modelNameUser.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => TRUE,));
 ?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
			<span class="pull-right">
				<?php echo $form->checkbox($modelUser,'is_active');?> Active
			</span>
		</p>
		<br><br>
		<fieldset>
			<legend>
				<label> Group Access Privileges <span class="required">*</span></label>
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUser, 'group_id'); ?>
				<?php echo $form -> dropDownList($modelUser, 'group_id', CHtml::listData(SBUsergroup::model()->findAll(array('order'=>'group_name ASC')),'id','group_name'),array('empty'=>'---','class' => 'form-control')); ?>
				<?php echo $form -> error($modelUser, 'group_id'); ?>
			</div>
		</fieldset>	
		<br>
		<fieldset>
			<legend>
				<label> User Data <span class="required">*</span></label>
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUser, 'name'); ?>
				<?php echo $form -> textField($modelUser, 'name', array('class' => 'form-control')); ?>
				<?php echo $form -> error($modelUser, 'name'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUser, 'email'); ?>
				<?php echo $form -> textField($modelUser, 'email', array('class' => 'form-control')); ?>
				<?php echo $form -> error($modelUser, 'email'); ?>
			</div>
		</fieldset>
		<br>
		<fieldset>
			<legend>
				<label> Login Required <span class="required">*</span></label>
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUser, 'username'); ?>
				<?php echo $form -> textField($modelUser, 'username', array('class' => 'form-control')); ?>
				<?php echo $form -> error($modelUser, 'username'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUser, 'password'); ?>
				<span class="form-control">*.*.*.*.*.*.*.*.*.*.*.*.*</span>
				<small style="color:#7F7F7F">Password will be generated automatically and will be sent to users email.</small>
				<?php echo $form -> error($modelUser, 'password'); ?>
			</div>
		</fieldset>	
		 
		 
		<div class="row buttons">
			<?php echo CHtml::Button('Save', array('class' => 'btn btn-success', 'id' => 'savePrivilege')); ?>
			<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
		</div>

		<?php $this -> endWidget(); ?>

	</div>
</div><!-- form -->
<script>
	$(function(){
		$("#savePrivilege").click(function(){
			 
			$("#savePrivilege").attr({
				'disabled':true,
				'value':'Save...'
			});
			loading('show');
			 
			$.post($('#<?php echo $this->modelNameUser;?>-form').attr('action'),$('#<?php echo $this->modelNameUser;?>-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->modelNameUser;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBUser_name){ 
						$("#SBUser_name.form-control").addClass('error'); 
						$('#SBUser_name_em_').html(response.SBUser_name).show(); 
					}else{ 
						$("#SBUser_name.form-control").removeClass('error'); 
						$('#SBUser_name_em_').hide(); 
					}
					if(response.SBUser_email){ 
						$("#SBUser_email.form-control").addClass('error'); 
						$('#SBUser_email_em_').html(response.SBUser_email).show();  
					}else{ 
						$("#SBUser_name.form-control").removeClass('error'); 
						$('#SBUser_email_em_').hide();  
					}
					if(response.SBUser_username){ 
						$("#SBUser_username.form-control").addClass('error'); 
						$('#SBUser_username_em_').html(response.SBUser_username).show();  
					}else{ 
						$("#SBUser_username.form-control").removeClass('error'); 
						$('#SBUser_username_em_').hide();  
					}
					if(response.SBUser_password){ 
						$("#SBUser_password.form-control").addClass('error'); 
						$('#SBUser_password_em_').html(response.SBUser_password).show();  
					}else{ 
						$("#SBUser_password.form-control").removeClass('error'); 
						$('#SBUser_password_em_').hide();  
					}
					if(response.SBUser_group_id){ 
						$("#SBUser_group_id.form-control").addClass('error'); 
						$('#SBUser_group_id_em_').html(response.SBUser_group_id).show();  
					}else{ 
						$("#SBUser_group_id.form-control").removeClass('error'); 
						$('#SBUser_group_id_em_').hide();  
					}
				}
				$("#savePrivilege").attr({
					'disabled':false,
					'value':'Save'
				});
				loading('hide');
			},'json');
			
		});
	});
</script>