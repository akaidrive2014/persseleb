<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */

$this->breadcrumbs=array(
	'Sbemail Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SBEmailTemplate', 'url'=>array('index')),
	array('label'=>'Manage SBEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Create SBEmailTemplate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>