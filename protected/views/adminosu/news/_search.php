<?php
/* @var $this NewsController */
/* @var $model SBNews */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="form-group">
	<div class="col-md-1">
		 
		<?php echo $form->textField($model,'news_id',array('class'=>'form-control','placeholder'=>$model -> getAttributeLabel('news_id'))); ?>
	</div>
	<?php /*
	<div class="col-md-3">
		 
		<?php echo $form->textField($model,'category_id',array('class'=>'form-control','placeholder'=>$model -> getAttributeLabel('category_id'))); ?>
	</div> */ ?>

	<div class="col-md-4">
		<?php echo $form->textField($model,'news_title',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>$model -> getAttributeLabel('news_title'))); ?>
	</div>

	<div class="col-md-2">
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>$model -> getAttributeLabel('source'))); ?>
	</div>

	<div class="col-md-2">
		<?php echo $form->textField($model,'news_date',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>$model -> getAttributeLabel('news_date'))); ?>
	</div>
	
	<?php /*
	<div class="col-md-2">
		 
		<?php echo $form->textField($model,'news_date',array('class'=>'form-control datepicker23','placeholder'=>$model -> getAttributeLabel('news_date'))); ?>
	</div>
	 */ ?>
	

	<div class="col-md-2">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
