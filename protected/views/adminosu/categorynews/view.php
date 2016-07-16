<?php
/* @var $this CategorynewsController */
/* @var $model SBNewsCategory */

$this->breadcrumbs=array(
	'Sbnews Categories'=>array('index'),
	$model->category_id,
);

$this->menu=array(
	array('label'=>'List SBNewsCategory', 'url'=>array('index')),
	array('label'=>'Create SBNewsCategory', 'url'=>array('create')),
	array('label'=>'Update SBNewsCategory', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'Delete SBNewsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SBNewsCategory', 'url'=>array('admin')),
);
?>

<h1>View SBNewsCategory #<?php echo $model->category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category_id',
		'parent_id',
		'category_name',
		'category_slug',
	),
)); ?>
