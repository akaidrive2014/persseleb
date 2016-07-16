<?php
/* @var $this PagesController */
/* @var $model SBPage */

$this->breadcrumbs=array(
	'Sbpages'=>array('index'),
	$model->page_id,
);

$this->menu=array(
	array('label'=>'List SBPage', 'url'=>array('index')),
	array('label'=>'Create SBPage', 'url'=>array('create')),
	array('label'=>'Update SBPage', 'url'=>array('update', 'id'=>$model->page_id)),
	array('label'=>'Delete SBPage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->page_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SBPage', 'url'=>array('admin')),
);
?>

<h1>View SBPage #<?php echo $model->page_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'page_id',
		'page_name',
		'page_image',
		'page_slug',
		'page_content',
		'seo_title',
		'seo_keywords',
		'seo_description',
	),
)); ?>
