<?php
/* @var $this PagesController */
/* @var $model SBPage */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">
			
			<?php echo $form -> textField($model, 'page_id', array('class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('page_id'))); ?>
		</div>
		<div class="col-md-5">
			
			<?php echo $form -> textField($model, 'page_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('page_name'))); ?>
		</div>

		<div class="col-md-4">
			
			<?php echo $form -> textField($model, 'page_slug', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('page_slug'))); ?>
		</div>

		<div class="col-md-2">
			
			<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
		</div>

	</div>

	

	<?php $this -> endWidget(); ?>
</div><!-- search-form -->
<div class="clearfix"></div>