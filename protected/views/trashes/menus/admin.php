<?php
/* @var $this MenusController */
/* @var $model SBMenu */

$this->breadcrumbs=array(
	'Sbmenus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SBMenu', 'url'=>array('index')),
	array('label'=>'Create SBMenu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sbmenu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sbmenus</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sbmenu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'menu_id',
		'parent_id',
		'menu_name',
		'action',
		'page_id',
		'category_news_id',
		/*
		'url_link',
		'link_key',
		'target',
		'positions',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
