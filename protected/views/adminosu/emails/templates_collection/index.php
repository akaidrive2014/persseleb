<?php
/* @var $this EmailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sbemail Templates',
);

$this->menu=array(
	array('label'=>'Create SBEmailTemplate', 'url'=>array('create')),
	array('label'=>'Manage SBEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Sbemail Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
