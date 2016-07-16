<?php
/* @var $this MenusController */
/* @var $model SBMenu */

$this->breadcrumbs=array(
	'Sbmenus'=>array('index'),
	$model->menu_id=>array('view','id'=>$model->menu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SBMenu', 'url'=>array('index')),
	array('label'=>'Create SBMenu', 'url'=>array('create')),
	array('label'=>'View SBMenu', 'url'=>array('view', 'id'=>$model->menu_id)),
	array('label'=>'Manage SBMenu', 'url'=>array('admin')),
);
?>

<h1>Update SBMenu <?php echo $model->menu_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>