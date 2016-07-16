<?php
/* @var $this CategorynewsController */
/* @var $model SBNewsCategory */

$this->breadcrumbs=array(
	'Sbnews Categories'=>array('index'),
	$model->category_id=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SBNewsCategory', 'url'=>array('index')),
	array('label'=>'Create SBNewsCategory', 'url'=>array('create')),
	array('label'=>'View SBNewsCategory', 'url'=>array('view', 'id'=>$model->category_id)),
	array('label'=>'Manage SBNewsCategory', 'url'=>array('admin')),
);
?>

<h1>Update SBNewsCategory <?php echo $model->category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>