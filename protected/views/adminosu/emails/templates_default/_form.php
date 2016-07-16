<?php
$this->avoidDoubleLoadJS();
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">
	<div class="panel-heading"> <?php echo $title;?> </div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->modelName.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'template_name'); ?>
		<?php echo $form->textField($model,'template_name',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'template_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email_subject'); ?>
		<?php echo $form->textField($model,'email_subject',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'email_subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template_html'); ?>
		<?php echo $form->textArea($model,'template_html',array('class'=>'form-control','id'=>'template_html')); ?>
		<?php echo $form->error($model,'template_html'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::Button('Save', array('class' => 'btn btn-success', 'id' => 'saveDefault')); ?>
		<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

	</div>
</div><!-- form -->
<div class="panel panel-default">
	<div class="panel-heading" style="border: none !important;"> Add Snippets to your Email Template: </div>
 
		<div class="panel-body form">
			<div class="col-md-5">
				<ul style="padding-left: 0px;">
					<li>
						<b>Receiver Name</b> = #RECEIVER_NAME#
					</li>
					<li>
						<b>Receiver Email</b> = #RECEIVER_EMAIL#
					</li>
					<li>
						<b>Message</b> = #MESSAGE#
					</li>
					<li>
						<b>Username</b> = #USERNAME#
					</li>
					<li>
						<b>Password</b> = #PASSWORD#
					</li>
					<li>
						<b>Code To Reset Password</b> = #RESET_PASSWORD#
					</li>
				</ul>
			</div>
			<div class="col-md-5">
				<ul style="padding-left: 0px;">
					 
				</ul>
			</div>
			 
		</div>
		 
</div>
<script>
	$(function(){
		$("#saveDefault").click(function(){			 
			$("#saveDefault").attr({
				'disabled':true,
				'value':'Save...'
			});
			loading('show');
			var template_html = encodeURIComponent(CKEDITOR.instances['template_html'].getData());
			$.post($('#<?php echo $this->modelName;?>-form').attr('action'),$('#<?php echo $this->modelName;?>-form').serialize()+'&SBEmailTemplate%5Btemplate_html%5D='+template_html,function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->modelName;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBEmailTemplate_template_name){ 
						$("#SBEmailTemplate_template_name.form-control").addClass('error'); 
						$('#SBEmailTemplate_template_name_em_').html(response.SBEmailTemplate_template_name).show(); 
					}else{ 
						$("#SBEmailTemplate_template_name.form-control").removeClass('error'); 
						$('#SBEmailTemplate_template_name_em_').hide(); 
					}
					if(response.SBEmailTemplate_template_html){ 
						$("#SBEmailTemplate_template_html.form-control").addClass('error'); 
						$('#SBEmailTemplate_template_html_em_').html(response.SBEmailTemplate_template_html).show(); 
					}else{ 
						$("#SBEmailTemplate_template_html.form-control").removeClass('error'); 
						$('#SBEmailTemplate_template_html_em_').hide(); 
					}
				}
				$("#saveDefault").attr({
					'disabled':false,
					'value':'Save'
				});
				loading('hide');
			},'json');
			
		});
	});
</script>

<script type="text/javascript">
	var editor = CKEDITOR.replace( 'template_html', {
		filebrowserBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=files',
		filebrowserImageBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=images',
		filebrowserFlashBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=flash',
		filebrowserUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=files',
		filebrowserImageUploadUrl :  '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=images',
		filebrowserFlashUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=flash',
	});
	CKEDITOR.on( 'instanceReady', function( evt ) {
   	loading('hide');
} );
</script>