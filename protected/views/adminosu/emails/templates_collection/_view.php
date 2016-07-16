<?php
/* @var $this EmailsController */
/* @var $data SBEmailTemplate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->template_id), array('view', 'id'=>$data->template_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_name')); ?>:</b>
	<?php echo CHtml::encode($data->template_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_html')); ?>:</b>
	<?php echo CHtml::encode($data->template_html); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_default')); ?>:</b>
	<?php echo CHtml::encode($data->is_default); ?>
	<br />


</div>