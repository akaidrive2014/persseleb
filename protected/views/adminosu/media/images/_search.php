<?php
/* @var $this MenusController */
/* @var $model SBMenu */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">
			 
			<?php echo $form -> textField($Image, 'image_id', array('class' => 'form-control', 'placeholder' => $Image -> getAttributeLabel('image_id'))); ?>
		</div>
		<div class="col-md-5">
			 
			<?php echo $form -> textField($Image, 'image_title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $Image -> getAttributeLabel('image_title'))); ?>
		</div>
		
		<div class="col-md-3">
			<?php echo $form -> dropDownList($Image, 'gallery_id', CHtml::listData(SBGallery::model()->findAll(array('order'=>'gallery_title ASC')),'gallery_id','gallery_title'),array('empty'=>'All','class' => 'form-control')); ?>
		</div>

		 

		<div class="col-md-2">
			 
			<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-info')); ?>
		</div>

	</div>

	<?php $this -> endWidget(); ?>
</div><!-- search-form -->
<div class="clearfix"></div>