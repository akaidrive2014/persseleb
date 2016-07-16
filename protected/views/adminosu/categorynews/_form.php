<?php
$this->avoidDoubleLoadJS(); 
/* @var $this CategorynewsController */
/* @var $model SBNewsCategory */
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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>
	<?php if(!$model->isNewRecord){?>
	<div class="row">
		<?php echo $form->labelEx($model,'category_slug'); ?>
		<?php echo $form->textField($model,'category_slug',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'category_slug'); ?>
	</div>
	<?php } ?>
	<fieldset>
		<legend>Seo (optional)</legend>
		<div class="row">
			<?php echo $form->labelEx($model,'seo_title'); ?>
			<?php echo $form->textField($model,'seo_title',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_title'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'seo_keywords'); ?>
			<?php echo $form->textField($model,'seo_keywords',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_keywords'); ?>
		</div>
		<div class="row">
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
					if(response.SBNewsCategory_category_name){ 
						$("#SBNewsCategory_category_name.form-control").addClass('error'); 
						$('#SBNewsCategory_category_name_em_').html(response.SBNewsCategory_category_name).show(); 
					}else{ 
						$("#SBNewsCategory_category_name").removeClass('error'); 
						$('#SBNewsCategory_category_name_em_').hide(); 
					} 
					if(response.SBNewsCategory_category_slug){ 
						$("#SBNewsCategory_category_slug.form-control").addClass('error'); 
						$('#SBNewsCategory_category_slug_em_').html(response.SBNewsCategory_category_slug).show(); 
					}else{ 
						$("#SBNewsCategory_category_slug").removeClass('error'); 
						$('#SBNewsCategory_category_slug_em_').hide(); 
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