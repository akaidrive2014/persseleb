<?php
/* @var $this NewsController */
/* @var $data SBNews */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->news_id), array('view', 'id'=>$data->news_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_title')); ?>:</b>
	<?php echo CHtml::encode($data->news_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_date')); ?>:</b>
	<?php echo CHtml::encode($data->news_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_thumb_image')); ?>:</b>
	<?php echo CHtml::encode($data->news_thumb_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_content')); ?>:</b>
	<?php echo CHtml::encode($data->news_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_url')); ?>:</b>
	<?php echo CHtml::encode($data->original_url); ?>
	<br />


</div>