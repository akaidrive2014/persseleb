<?php
/* @var $this PagesController */
/* @var $model SBPage */

$this->breadcrumbs=array(
	'Sbpages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SBPage', 'url'=>array('index')),
	array('label'=>'Manage SBPage', 'url'=>array('admin')),
);
?>

<h1>Create SBPage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>