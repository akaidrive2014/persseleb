<?php
/* @var $this MenusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sbmenus',
);

$this->menu=array(
	array('label'=>'Create SBMenu', 'url'=>array('create')),
	array('label'=>'Manage SBMenu', 'url'=>array('admin')),
);
?>

<h1>Sbmenus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
