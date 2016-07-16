<?php
/* @var $this PagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sbpages',
);

$this->menu=array(
	array('label'=>'Create SBPage', 'url'=>array('create')),
	array('label'=>'Manage SBPage', 'url'=>array('admin')),
);
?>

<h1>Sbpages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
