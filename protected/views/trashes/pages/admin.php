<?php
/* @var $this PagesController */
/* @var $model SBPage */

$this->breadcrumbs=array(
	'Sbpages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SBPage', 'url'=>array('index')),
	array('label'=>'Create SBPage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sbpage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sbpages</h1>

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
	'id'=>'sbpage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'page_id',
		'page_name',
		'page_image',
		'page_slug',
		'page_content',
		'seo_title',
		/*
		'seo_keywords',
		'seo_description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
