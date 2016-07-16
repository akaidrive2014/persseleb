<?php
/* @var $this CategorynewsController */
/* @var $model SBNewsCategory */
/* @var $form CActiveForm */
?>

<div class="row">

	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>

	<div class="form-group">
		<div class="col-md-1">
			 
			<?php echo $form -> textField($model, 'category_id', array('class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('category_id'))); ?>
		</div>
		<div class="col-md-4">
			 
			<?php echo $form -> dropDownList($model, 'parent_id',CHtml::listData(SBNewsCategory::model()->findAll(),'category_id','category_name') ,array('empty'=>'Parent (Category Name)', 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('parent_id'))); ?>
		</div>
		<div class="col-md-5">
			 
			<?php echo $form -> textField($model, 'category_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('category_name'))); ?>
		</div>

		 

		<div class="col-md-2">
			 
			<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
		</div>

	</div>

	

	<?php $this -> endWidget(); ?>
</div><!-- search-form -->
<div class="clearfix"></div>