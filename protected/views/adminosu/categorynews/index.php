<?php
/* @var $this CategorynewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sbnews Categories',
);

$this->menu=array(
	array('label'=>'Create SBNewsCategory', 'url'=>array('create')),
	array('label'=>'Manage SBNewsCategory', 'url'=>array('admin')),
);
?>

<h1>Sbnews Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
