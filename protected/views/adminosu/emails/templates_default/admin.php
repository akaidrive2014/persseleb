<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#".$this->modelName."-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="table-responsive">
		<div class="page_bar clearfix">
	 
</div>
<?php echo CHtml::link('<i class="glyphicon glyphicon-search"></i> Search','#',array('class'=>'search-button btn btn-default')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('templates_default/_search',array(
		'templateDefault'=>$templateDefault,
	));  ?>
	</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'pagerCssClass'=>'text-center',
	'pager' => array(
		'class' => 'CLinkPager', 
		'header' => '',
		'selectedPageCssClass'=>'active',
		'nextPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
		'prevPageLabel'=>'<i class="fa fa-angle-double-left"></i>',
		'htmlOptions'=>array(
			'class'=>'pagination pagination-sm',
			'id'=>FALSE,
		),
	),
	'id'=>$this->modelName.'-grid',
	'dataProvider'=>$templateDefault->search(),
	//'filter'=>$model,
	'itemsCssClass'=>'table table-bordered',
	'afterAjaxUpdate'=>'modal',
	'columns'=>array(
		'template_id',
		'template_name',
		'email_subject',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(
			  'update' => array(
			  		'options' => array('data-toggle'=>'tooltip','title' => 'Edit', 'class' => 'btn btn-x btn-default btn-xs'),
            		'label' => "<i class='fa fa-pencil-square-o'></i>",
            		'url'=>'Yii::app()->createUrl("adminosu/emails/update_template_default",array("id"=>"$data->template_id"))',
            		'imageUrl' => false,
					'click'=>"function(){
						loading('show');
                       	$('.view-x').load($(this).attr('href'),function(){
                       		//loading('hide')	
                       		$('.modal-dialog').css({'width':'90%'});
                     	});
							
                     return false;
                     }",
				   ),
		           
			),
			
	   ),
	),
)); ?>
</div>