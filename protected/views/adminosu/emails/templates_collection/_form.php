<?php
$this->avoidDoubleLoadJS();
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sbemail-template-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'template_name'); ?>
		<?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'template_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template_html'); ?>
		<?php echo $form->textArea($model,'template_html',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'template_html'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_default'); ?>
		<?php echo $form->textField($model,'is_default'); ?>
		<?php echo $form->error($model,'is_default'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->