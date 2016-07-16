<?php
Yii::app()->clientScript->registerScript('searchx', "
$('.search-but').click(function(){
	$('.search-formx').toggle();
	return false;
});
$('.search-formx form').submit(function(){
	$('#".$this->modelNameUser."-grid').yiiGridView('update', {
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
    		array($this->id.'/create_user'), 
    		array('update' => ".view-x",//".content-data-x",
			'beforeSend' => 'function(){
  				loading("show");
			}',
			'complete' => 'function(){
  				$(".loading-x").fadeOut("slow",function(){
  					//$(".modal-dialog").css({"width":"90%"});
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
	<?php echo CHtml::link('<i class="glyphicon glyphicon-search"></i> Search','#',array('class'=>'search-but btn btn-default')); ?>
	<div class="search-formx" style="display:none">
	<?php $this->renderPartial('users/_search',array(
		'Users'=>$Users,
	));  ?>
	</div><!-- search-form -->
	
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'pagerCssClass'=>'text-center',
			'pager' => array(
				'class' => 'CLinkPager', 
				'header' => '',
				'selectedPageCssClass'=>'active',
				'nextPageLabel'=>'<i class="fa fa-angle-right"></i>',
				'prevPageLabel'=>'<i class="fa fa-angle-left"></i>',
				'lastPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
				'firstPageLabel'=>'<i class="fa fa-angle-double-left"></i>',		
				'htmlOptions'=>array(
					'class'=>'pagination pagination-sm',
					'id'=>FALSE,
				),
			),
			'id'=>$this->modelNameUser.'-grid',
			'dataProvider'=>$Users->search(),
			//'filter'=>$model,
			'itemsCssClass'=>'table table-bordered',
			'afterAjaxUpdate'=>'modal',
			'columns'=>array(
				'id',
				'name',
				'email',
				'username',
				array(
					'name'=>'created_date',
					'value'=>'$data->createdDate',
				),
				array(
				'class'=>'CButtonColumn',
				'template'=>'{update} {delete}',
				'buttons'=>array(
					  'update' => array(
					  		'options' => array('data-toggle'=>'tooltip','title' => 'Edit', 'class' => 'btn btn-x btn-default btn-xs'),
	                		'label' => "<i class='fa fa-pencil-square-o'></i>",
	                		'url'=>'Yii::app()->createUrl("adminosu/userprivileges/update_user",array("id"=>"$data->id"))',
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
				           'delete' => array(
		                		'options' => array('data-toggle'=>'tooltip','title' => 'Delete', 'class' => 'btn btn-danger btn-xs'),
		                		'label' => '<i class="glyphicon glyphicon-remove"></i>',
		                		'url'=>'Yii::app()->createUrl("adminosu/userprivileges/delete_user",array("id"=>"$data->id"))',
		                		'imageUrl' => false,
				           ),
					),
					
			   ),
			),
		)); ?>
</div>