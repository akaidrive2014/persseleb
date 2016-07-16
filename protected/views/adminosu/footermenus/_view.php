<?php
/* @var $this MenusController */
/* @var $data SBMenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->menu_id), array('view', 'id'=>$data->menu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_name')); ?>:</b>
	<?php echo CHtml::encode($data->menu_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::encode($data->page_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_news_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_news_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_link')); ?>:</b>
	<?php echo CHtml::encode($data->url_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('link_key')); ?>:</b>
	<?php echo CHtml::encode($data->link_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target')); ?>:</b>
	<?php echo CHtml::encode($data->target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('positions')); ?>:</b>
	<?php echo CHtml::encode($data->positions); ?>
	<br />

	*/ ?>

</div>