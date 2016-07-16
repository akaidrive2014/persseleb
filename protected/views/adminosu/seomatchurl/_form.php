<?php
$this->avoidDoubleLoadJS();
/* @var $this SeomatchurlController */
/* @var $model SBUrlseo */
/* @var $form CActiveForm */
?>
 
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->modelName.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>TRUE,
	'htmlOptions'=>array(
		"enctype"=>"multipart/form-data"
	)
)); ?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
		<span style="float: right;">
			<?php echo $form->checkBox($model,'is_active',array('style'=>'float:left;')); ?>
			<?php echo $form->label($model,'is_active',array('style'=>'float:left;')); ?>	
		</span>
	</p>

	<?php echo $form->errorSummary($model); ?>
	 
	 
	<div class="form-group">
		<?php echo $form->labelEx($model,'url_matched'); ?>
		<?php echo $form->textField($model,'url_matched',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'url_matched'); ?>
	</div>
	
	<fieldset>
		<legend>Seo Pack</legend>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_title'); ?>
			<?php echo $form->textField($model,'seo_title',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_title'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_keywords'); ?>
			<?php echo $form->textField($model,'seo_keywords',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_keywords'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_description'); ?>
			<?php echo $form->textArea($model,'seo_description',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_description'); ?>
		</div>
	</fieldset>
	<div class="row buttons">
		<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success','id'=>'save')); ?>
		<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->
 
<script>
	$(function(){
		$("#save").click(function(){
			//alert($('#SBPage_page_name').val());
			$("#save").attr({
				'disabled':true,
				'value':'<?php echo $model -> isNewRecord ? 'Create...' : 'Save...';?>'
			});
			loading('show');
			$.post($('#<?php echo $this->modelName;?>-form').attr('action'),$('#<?php echo $this->modelName;?>-form').serialize(),function(response){
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
					if(response.SBUrlseo_url_matched){ 
						$("#SBUrlseo_url_matched.form-control").addClass('error'); 
						$('#SBUrlseo_url_matched_em_').html(response.SBUrlseo_url_matched).show(); 
					}else{ 
						$("#SBUrlseo_url_matched").removeClass('error'); 
						$('#SBUrlseo_url_matched_em_').hide(); 
					}
					if(response.SBUrlseo_seo_title){ 
						$("#SBUrlseo_seo_title.form-control").addClass('error'); 
						$('#SBUrlseo_seo_title_em_').html(response.SBUrlseo_seo_title).show(); 
					}else{ 
						$("#SBUrlseo_seo_title").removeClass('error'); 
						$('#SBUrlseo_seo_title_em_').hide(); 
					} 
					if(response.SBUrlseo_seo_keywords){ 
						$("#SBUrlseo_seo_keywords.form-control").addClass('error'); 
						$('#SBUrlseo_seo_keywords_em_').html(response.SBUrlseo_seo_keywords).show(); 
					}else{ 
						$("#SBUrlseo_seo_keywords.form-control").removeClass('error'); 
						$('#SBUrlseo_seo_keywords_em_').hide(); 
					}
					if(response.SBUrlseo_seo_description){ 
						$("#SBUrlseo_seo_description.form-control").addClass('error'); 
						$('#SBUrlseo_seo_description_em_').html(response.SBUrlseo_seo_description).show(); 
					}else{ 
						$("#SBUrlseo_seo_description.form-control").removeClass('error'); 
						$('#SBUrlseo_seo_description_em_').hide(); 
					}
					
					 
				}
				$("#save").attr({
					'disabled':false,
					'value':'<?php echo $model -> isNewRecord ? 'Create' : 'Save';?>'
				});
				loading('hide');
			},'json');
			
		});
	});
</script>