<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sbnews',
);

$this->menu=array(
	array('label'=>'Create SBNews', 'url'=>array('create')),
	array('label'=>'Manage SBNews', 'url'=>array('admin')),
);
?>

<h1>Sbnews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
