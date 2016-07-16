<?php $this->avoidDoubleLoadJS(); ?>
<div class="panel panel-default">
	<div class="panel-heading"> <?php echo $title;?> </div>
	<div class="panel-body form">

		<?php $form = $this -> beginWidget('CActiveForm', array('id' => $this->modelNameUserGroup.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => TRUE,));
 ?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>
		<br><br>
		<fieldset>
			<legend>
				<label> User Group <span class="required">*</span></label>
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($modelUserGroups, 'group_name'); ?>
				<?php echo $form -> textField($modelUserGroups, 'group_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
				<?php echo $form -> error($modelUserGroups, 'group_name'); ?>
			</div>
		</fieldset>	
		<fieldset>
			<legend>
				<label> Access Privileges <span class="required">*</span></label>
				<div style="display:none" id="SBUsergroup_group_rights_em_" class="errorMessage"></div>
			</legend>
			<div class="form-group">
				<div class="col-md-4">
					<fieldset>
						<h4><i class="ion-speedometer"></i> Dashboard</h4>
						<input type="checkbox" <?php echo $this->isChecked('dashboard',$modelUserGroups->list_rights);?> value="dashboard" name="SBUsergroup[rights][dashboard][]" />  &nbsp;Dashboard<br>
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-globe"></i> Website</h4>
						<input type="checkbox" <?php echo $this->isChecked('pages',$modelUserGroups->list_rights);?> value="pages" name="SBUsergroup[rights][website][]" />  &nbsp;Pages Management<br>
						<input type="checkbox" <?php echo $this->isChecked('menus',$modelUserGroups->list_rights);?> value="menus" name="SBUsergroup[rights][website][]" />  &nbsp;Menus Management<br>
						<input type="checkbox" <?php echo $this->isChecked('footermenus',$modelUserGroups->list_rights);?> value="footermenus" name="SBUsergroup[rights][website][]" />  &nbsp;Footer Menus Management<br>
						<input type="checkbox" <?php echo $this->isChecked('categorynews',$modelUserGroups->list_rights);?> value="categorynews" name="SBUsergroup[rights][website][]" />  &nbsp;Categories Management<br>
						<input type="checkbox" <?php echo $this->isChecked('news',$modelUserGroups->list_rights);?> value="news" name="SBUsergroup[rights][website][]" />  &nbsp;News Management<br>
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-picture-o"></i> Media</h4>
						<input type="checkbox" <?php echo $this->isChecked('galleries',$modelUserGroups->list_rights);?> value="galleries" name="SBUsergroup[rights][media][]" />  &nbsp;Galleries Collection<br>
						<input type="checkbox" <?php echo $this->isChecked('images',$modelUserGroups->list_rights);?> value="images" name="SBUsergroup[rights][media][]" />  &nbsp;Images Collection<br>
						<input type="checkbox" <?php echo $this->isChecked('videos',$modelUserGroups->list_rights);?> value="videos" name="SBUsergroup[rights][media][]" />  &nbsp;Videos Collection<br>
					</fieldset>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-envelope"></i> Email</h4>
						<input type="checkbox" <?php echo $this->isChecked('templatesDefault',$modelUserGroups->list_rights);?> value="templatesDefault" name="SBUsergroup[rights][email][]" />  &nbsp; Templates Default<br>
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-user-md"></i> Seo </h4>
						<input type="checkbox" <?php echo $this->isChecked('seomatchurl',$modelUserGroups->list_rights);?> value="seomatchurl" name="SBUsergroup[rights][seo][]" />  &nbsp;Seo Match Url<br>						
					</fieldset>
				</div>	
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-user-md"></i> Users</h4>
						<input type="checkbox" <?php echo $this->isChecked('users',$modelUserGroups->list_rights);?> value="users" name="SBUsergroup[rights][user][]" />  &nbsp;Users<br>
						<input type="checkbox" <?php echo $this->isChecked('privileges',$modelUserGroups->list_rights);?> value="privileges" name="SBUsergroup[rights][user][]" />  &nbsp;Privileges<br>
					</fieldset>
				</div>				
				<div class="col-md-4">
					<fieldset>
						<h4><i class="fa fa-wrench"></i> Setting</h4>
						<input type="checkbox" <?php echo $this->isChecked('websitedata',$modelUserGroups->list_rights);?> value="websitedata" name="SBUsergroup[rights][setting][]" />  &nbsp;Website Data<br>
						<input type="checkbox" <?php echo $this->isChecked('smtpmail',$modelUserGroups->list_rights);?> value="smtpmail" name="SBUsergroup[rights][setting][]" />  &nbsp;Smtp Mail<br>
					</fieldset>
				</div>
				<div class="clearfix"></div>
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
			 
			$.post($('#<?php echo $this->modelNameUserGroup;?>-form').attr('action'),$('#<?php echo $this->modelNameUserGroup;?>-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->modelNameUserGroup;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBUsergroup_group_name){ 
						$("#SBUsergroup_group_name.form-control").addClass('error'); 
						$('#SBUsergroup_group_name_em_').html(response.SBUsergroup_group_name).show(); 
					}else{ 
						$("#SBUsergroup_group_name.form-control").removeClass('error'); 
						$('#SBUsergroup_group_name_em_').hide(); 
					}
					if(response.SBUsergroup_rights){ 
						//$("#SBUsergroup_rights.form-control").addClass('error'); 
						$('#SBUsergroup_group_rights_em_').html(response.SBUsergroup_rights).show(); 
					}else{ 
						//$("#SBUsergroup_rights.form-control").removeClass('error'); 
						$('#SBUsergroup_group_rights_em_').empty(); 
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