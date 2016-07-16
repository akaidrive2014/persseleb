<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */

$this->breadcrumbs=array(
	'Sbemail Templates'=>array('index'),
	$model->template_id=>array('view','id'=>$model->template_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SBEmailTemplate', 'url'=>array('index')),
	array('label'=>'Create SBEmailTemplate', 'url'=>array('create')),
	array('label'=>'View SBEmailTemplate', 'url'=>array('view', 'id'=>$model->template_id)),
	array('label'=>'Manage SBEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Update SBEmailTemplate <?php echo $model->template_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>