<?php
/* @var $this PagesController */
/* @var $model SBPage */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">
			
			<?php echo $form -> textField($model, 'seo_id', array('class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('seo_id'))); ?>
		</div>
		<div class="col-md-5">
			
			<?php echo $form -> textField($model, 'url_matched', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('url_matched'))); ?>
		</div>

		<div class="col-md-4">
			
			<?php echo $form -> textField($model, 'seo_title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('seo_title'))); ?>
		</div>

		<div class="col-md-2">
			
			<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
		</div>

	</div>

	

	<?php $this -> endWidget(); ?>
</div><!-- search-form -->
<div class="clearfix"></div>