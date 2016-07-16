<?php
/* @var $this CategorynewsController */
/* @var $model SBNewsCategory */

$this->breadcrumbs=array(
	'Sbnews Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SBNewsCategory', 'url'=>array('index')),
	array('label'=>'Manage SBNewsCategory', 'url'=>array('admin')),
);
?>

<h1>Create SBNewsCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>