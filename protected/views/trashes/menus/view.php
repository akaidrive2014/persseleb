<?php
/* @var $this MenusController */
/* @var $model SBMenu */

$this->breadcrumbs=array(
	'Sbmenus'=>array('index'),
	$model->menu_id,
);

$this->menu=array(
	array('label'=>'List SBMenu', 'url'=>array('index')),
	array('label'=>'Create SBMenu', 'url'=>array('create')),
	array('label'=>'Update SBMenu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete SBMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SBMenu', 'url'=>array('admin')),
);
?>

<h1>View SBMenu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'parent_id',
		'menu_name',
		'action',
		'page_id',
		'category_news_id',
		'url_link',
		'link_key',
		'target',
		'positions',
	),
)); ?>
