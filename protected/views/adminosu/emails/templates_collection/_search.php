<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">

			<?php echo $form -> textField($templateDefault, 'template_id', array('class' => 'form-control', 'placeholder' => $templateDefault -> getAttributeLabel('template_id'))); ?>
		</div>
		<div class="col-md-5">

			<?php echo $form -> textField($templateDefault, 'template_name', array('class' => 'form-control', 'placeholder' => $templateDefault -> getAttributeLabel('template_name'))); ?>
		</div>

		<div class="col-md-2">

			<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-info')); ?>
		</div>

	</div>

	<?php $this -> endWidget(); ?>
</div><!-- search-form --><div class="clearfix"></div>