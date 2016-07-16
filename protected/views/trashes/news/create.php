<?php
/* @var $this NewsController */
/* @var $model SBNews */

$this->breadcrumbs=array(
	'Sbnews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SBNews', 'url'=>array('index')),
	array('label'=>'Manage SBNews', 'url'=>array('admin')),
);
?>

<h1>Create SBNews</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>