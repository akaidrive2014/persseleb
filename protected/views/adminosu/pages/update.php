<?php
/* @var $this PagesController */
/* @var $model SBPage */

$this->breadcrumbs=array(
	'Sbpages'=>array('index'),
	$model->page_id=>array('view','id'=>$model->page_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SBPage', 'url'=>array('index')),
	array('label'=>'Create SBPage', 'url'=>array('create')),
	array('label'=>'View SBPage', 'url'=>array('view', 'id'=>$model->page_id)),
	array('label'=>'Manage SBPage', 'url'=>array('admin')),
);
?>

<h1>Update SBPage <?php echo $model->page_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>