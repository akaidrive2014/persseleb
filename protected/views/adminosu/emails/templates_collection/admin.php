<?php
/* @var $this EmailsController */
/* @var $model SBEmailTemplate */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sbemail-template-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="table-responsive">
		<div class="page_bar clearfix">
	<div class="row">
		<div class="col-md-10">
			<h1 class="page_title">&nbsp;</h1>
			 
		</div>
		<div class="col-md-2 text-right">
			<?php echo CHtml::ajaxLink(
    		' <i class="glyphicon glyphicon-plus"></i> Add New ', 
    		array($this->id.'/create_template_default'), 
    		array('update' => ".view-x",//".content-data-x",
			'beforeSend' => 'function(){
  				loading("show");
			}',
			'complete' => 'function(){
  				$(".loading-x").fadeOut("slow",function(){
  					$(".modal-dialog").css({"width":"90%"});
  				});
  				loading("hide");
				return false;
  				 
			}',
			),
    		array('class'=>'btn btn-success btn-x')
		);?>
		</div>
	</div>
</div>
<?php echo CHtml::link('<i class="glyphicon glyphicon-search"></i> Search','#',array('class'=>'search-button btn btn-default')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('templates_default/_search',array(
		'templateDefault'=>$templateDefault,
	));  ?>
	</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sbemail-template-grid',
	'dataProvider'=>$templateDefault->search(),
	//'filter'=>$model,
	'itemsCssClass'=>'table table-bordered',
	'afterAjaxUpdate'=>'modal',
	'columns'=>array(
		'template_id',
		'template_name',
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
                       		loading('hide')	
                       		//$('.modal-dialog').css({'width':'90%'});
                     	});
							
                     return false;
                     }",
				   ),
		           
			),
			
	   ),
	),
)); ?>
</div>