<?php
/* @var $this NewsController */
/* @var $model SBNews */

$this->breadcrumbs=array(
	'Sbnews'=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SBNews', 'url'=>array('index')),
	array('label'=>'Create SBNews', 'url'=>array('create')),
	array('label'=>'View SBNews', 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>'Manage SBNews', 'url'=>array('admin')),
);
?>

<h1>Update SBNews <?php echo $model->news_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>