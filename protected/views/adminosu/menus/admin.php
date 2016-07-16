<?php
/* @var $this MenusController */
/* @var $model SBMenu */

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

<div class="container-fluid"> 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="table-responsive">
						<div class="page_bar clearfix">
						<div class="row">
							<div class="col-md-8">
								<h1 class="page_title"><?php echo $title;?></h1>
								 
							</div>
							<div class="col-md-2 text-right">
								
								<?php echo CHtml::ajaxLink(
				        		' <i class="glyphicon glyphicon-tasks"></i> Setting Position ', 
				        		array($this->id.'/setting?position'), 
				        		array('update' => ".view-x",//".content-data-x",
								'beforeSend' => 'function(){
				      				loading("show");
									$(".modal-dialog").removeAttr("style");
								}',
								'complete' => 'function(){
				      				$(".loading-x").fadeOut("slow",function(){
				      					//$(".modal-dialog").css({"width":"90%"});
				      				});
				      				//loading("hide");
									return false;
				      				 
								}',
								),
				        		array('class'=>'btn btn-default btn-x')
							);?>
							</div>
							<div class="col-md-2 text-right">
								
								<?php echo CHtml::ajaxLink(
				        		' <i class="glyphicon glyphicon-plus"></i> Add New ', 
				        		array($this->id.'/create'), 
				        		array('update' => ".view-x",//".content-data-x",
								'beforeSend' => 'function(){
				      				loading("show");
								}',
								'complete' => 'function(){
				      				$(".loading-x").fadeOut("slow",function(){
				      					$(".modal-dialog").css({"width":"90%"});
				      				});
				      				//loading("hide");
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
						<?php $this->renderPartial('_search',array(
							'model'=>$model,
						)); ?>
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
								'id'=>'sbmenu-grid',
								'dataProvider'=>$model->search(),
								//'filter'=>$model,
								'itemsCssClass'=>'table table-bordered',
								'afterAjaxUpdate'=>'modal',
								'columns'=>array(
									'menu_id',
									'parent_id',
									'menu_name',
									array(
										'name'=>'menu_name',
										'value'=>'$data->link',
									),
									//'action',
									//'page_id',
									//'category_news_id',
									/*
									'url_link',
									'link_key',
									'target',
									'positions',
									*/
									array(
									'class'=>'CButtonColumn',
									'template'=>'{update} {delete}',
									'buttons'=>array(
										  'update' => array(
										  		'options' => array('data-toggle'=>'tooltip','title' => 'Edit', 'class' => 'btn btn-x btn-default btn-xs'),
						                		'label' => "<i class='fa fa-pencil-square-o'></i>",
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
									           'delete' => array(
							                		'options' => array('data-toggle'=>'tooltip','title' => 'Delete', 'class' => 'btn btn-danger btn-xs'),
							                		'label' => '<i class="glyphicon glyphicon-remove"></i>',
							                		'imageUrl' => false,
									           ),
										),
										
								   ),
								),
							)); ?>
					</div>
				</div>
		</div>
	</div>
</div>