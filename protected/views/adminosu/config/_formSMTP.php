<div class="panel panel-default">

	<div class="panel-body form">

		<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'smtp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation' => TRUE,));
 ?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

		 
		<br><br>
		<fieldset>
			<legend>
				Info Sender Configuration
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'email_sender'); ?>
				<?php echo $form -> textField($smtp, 'email_sender', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'email_sender'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'sender_name'); ?>
				<?php echo $form -> textField($smtp, 'sender_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'sender_name'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'carbon_copy'); ?>
				<?php echo $form -> textField($smtp, 'carbon_copy', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'carbon_copy'); ?>
			</div>
		</fieldset>	
		<br><br>
		<fieldset>
			<legend>
				SMTP Configuration
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'host_smtp'); ?>
				<?php echo $form -> textField($smtp, 'host_smtp', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'host_smtp'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'port_smtp'); ?>
				<?php echo $form -> textField($smtp, 'port_smtp', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'port_smtp'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'username_smtp'); ?>
				<?php echo $form -> textField($smtp, 'username_smtp', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'username_smtp'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($smtp, 'password_smtp'); ?>
				<?php echo $form -> textField($smtp, 'password_smtp', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($smtp, 'password_smtp'); ?>
			</div>
		</fieldset>
		<div class="row buttons">
			<?php echo CHtml::Button('Save', array('class' => 'btn btn-success', 'id' => 'saveSMTP')); ?>
			<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
		</div>

		<?php $this -> endWidget(); ?>

	</div>
</div><!-- form -->
<script>
	$(function(){
		$("#saveSMTP").click(function(){
			 
			$("#saveSMTP").attr({
				'disabled':true,
				'value':'Save...'
			});
			loading('show');
			 
			$.post($('#smtp-form').attr('action'),$('#smtp-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);/*
					$('#config-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); */
					//$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.ConfigSmtpEmail_email_sender){ 
						$("#ConfigSmtpEmail_email_sender.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_email_sender_em_').html(response.ConfigSmtpEmail_email_sender).show(); 
					}else{ 
						$("#ConfigSmtpEmail_email_sender.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_email_sender_em_').hide(); 
					}
					if(response.ConfigSmtpEmail_sender_name){ 
						$("#ConfigSmtpEmail_sender_name.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_sender_name'+'_em_').html(response.ConfigSmtpEmail_sender_name).show(); 
					}else{ 
						$("#ConfigSmtpEmail_sender_name.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_sender_name'+'_em_').hide(); 
					}
					if(response.ConfigSmtpEmail_host_smtp){ 
						$("#ConfigSmtpEmail_host_smtp.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_host_smtp'+'_em_').html(response.ConfigSmtpEmail_host_smtp).show(); 
					}else{ 
						$("#ConfigSmtpEmail_host_smtp.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_host_smtp'+'_em_').hide(); 
					}
					if(response.ConfigSmtpEmail_port_smtp){ 
						$("#ConfigSmtpEmail_port_smtp.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_port_smtp'+'_em_').html(response.ConfigSmtpEmail_port_smtp).show(); 
					}else{ 
						$("#ConfigSmtpEmail_port_smtp.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_port_smtp'+'_em_').hide(); 
					}
					if(response.ConfigSmtpEmail_username_smtp){ 
						$("#ConfigSmtpEmail_username_smtp.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_username_smtp'+'_em_').html(response.ConfigSmtpEmail_username_smtp).show(); 
					}else{ 
						$("#ConfigSmtpEmail_username_smtp.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_username_smtp'+'_em_').hide(); 
					}
					if(response.ConfigSmtpEmail_password_smtp){ 
						$("#ConfigSmtpEmail_password_smtp.form-control").addClass('error'); 
						$('#ConfigSmtpEmail_password_smtp'+'_em_').html(response.ConfigSmtpEmail_password_smtp).show(); 
					}else{ 
						$("#ConfigSmtpEmail_password_smtp.form-control").removeClass('error'); 
						$('#ConfigSmtpEmail_password_smtp'+'_em_').hide(); 
					}
				}
				$("#saveSMTP").attr({
					'disabled':false,
					'value':'Save'
				});
				loading('hide');
			},'json');
			
		});
	});
</script>