<?php
/* @var $this NewsController */
/* @var $model SBNews */

$this->breadcrumbs=array(
	'Sbnews'=>array('index'),
	$model->news_id,
);

$this->menu=array(
	array('label'=>'List SBNews', 'url'=>array('index')),
	array('label'=>'Create SBNews', 'url'=>array('create')),
	array('label'=>'Update SBNews', 'url'=>array('update', 'id'=>$model->news_id)),
	array('label'=>'Delete SBNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SBNews', 'url'=>array('admin')),
);
?>

<h1>View SBNews #<?php echo $model->news_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'news_id',
		'category_id',
		'news_title',
		'news_date',
		'news_thumb_image',
		'news_content',
		'original_url',
	),
)); ?>
