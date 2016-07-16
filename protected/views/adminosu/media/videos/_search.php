<?php
/* @var $this MenusController */
/* @var $model SBMenu */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">
			 
			<?php echo $form -> textField($Video, 'video_id', array('class' => 'form-control', 'placeholder' => $Video -> getAttributeLabel('video_id'))); ?>
		</div>
		<div class="col-md-5">
			 
			<?php echo $form -> textField($Video, 'video_title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $Video -> getAttributeLabel('video_title'))); ?>
		</div>

		 

		<div class="col-md-2">
			 
			<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-info')); ?>
		</div>

	</div>

	<?php $this -> endWidget(); ?>
</div><!-- search-form -->
<div class="clearfix"></div>