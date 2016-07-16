<?php
/* @var $this MenusController */
/* @var $model SBMenu */

$this->breadcrumbs=array(
	'Sbmenus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SBMenu', 'url'=>array('index')),
	array('label'=>'Manage SBMenu', 'url'=>array('admin')),
);
?>

<h1>Create SBMenu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>