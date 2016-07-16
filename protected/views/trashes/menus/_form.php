<?php
/* @var $this MenusController */
/* @var $model SBMenu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sbmenu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_name'); ?>
		<?php echo $form->textField($model,'menu_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'menu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_id'); ?>
		<?php echo $form->textField($model,'page_id'); ?>
		<?php echo $form->error($model,'page_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_news_id'); ?>
		<?php echo $form->textField($model,'category_news_id'); ?>
		<?php echo $form->error($model,'category_news_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_link'); ?>
		<?php echo $form->textField($model,'url_link',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_key'); ?>
		<?php echo $form->textField($model,'link_key',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'link_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target'); ?>
		<?php echo $form->textField($model,'target',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'target'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'positions'); ?>
		<?php echo $form->textField($model,'positions'); ?>
		<?php echo $form->error($model,'positions'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->