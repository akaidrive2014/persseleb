<?php
/* @var $this NewsController */
/* @var $model SBNews */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sbnews-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_title'); ?>
		<?php echo $form->textField($model,'news_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'news_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_date'); ?>
		<?php echo $form->textField($model,'news_date'); ?>
		<?php echo $form->error($model,'news_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_thumb_image'); ?>
		<?php echo $form->textArea($model,'news_thumb_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'news_thumb_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_content'); ?>
		<?php echo $form->textArea($model,'news_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'news_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'original_url'); ?>
		<?php echo $form->textArea($model,'original_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'original_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->