<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */

$this->breadcrumbs=array(
	'Sbemail Templates'=>array('index'),
	$model->template_id,
);

$this->menu=array(
	array('label'=>'List SBEmailTemplate', 'url'=>array('index')),
	array('label'=>'Create SBEmailTemplate', 'url'=>array('create')),
	array('label'=>'Update SBEmailTemplate', 'url'=>array('update', 'id'=>$model->template_id)),
	array('label'=>'Delete SBEmailTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->template_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SBEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>View SBEmailTemplate #<?php echo $model->template_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'template_id',
		'template_name',
		'template_html',
		'is_default',
	),
)); ?>
